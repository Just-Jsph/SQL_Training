<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\DatasetTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatasetImportController extends Controller
{
    public function create()
    {
        $datasets = Dataset::orderBy('name')->get();

        return view('datasets.import', compact('datasets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dataset_id' => [
                'required',
                'exists:datasets,id'
            ],

            'table_name' => [
                'required',
                'string',
                'max:50',
                'regex:/^[a-zA-Z_][a-zA-Z0-9_]*$/'
            ],

            'file' => [
                'required',
                'file',
                'mimes:csv,txt',
                'max:20480'
            ],
        ]);

        $tableName = $request->table_name;

        if (Schema::hasTable($tableName)) {
            return back()
                ->withInput()
                ->with('error', 'That database table already exists.');
        }

        $handle = fopen(
            $request->file('file')->getRealPath(),
            'r'
        );

        if (!$handle) {
            return back()
                ->withInput()
                ->with('error', 'Unable to read CSV file.');
        }

        $headers = fgetcsv($handle);

        if (!$headers) {
            fclose($handle);

            return back()
                ->withInput()
                ->with('error', 'The CSV file is empty.');
        }

        $headers = array_map(
            function ($header) {
                $header = trim($header);

                $header = preg_replace(
                    '/[^a-zA-Z0-9_]/',
                    '_',
                    $header
                );

                return strtolower($header);
            },
            $headers
        );

        $headers = array_values(
            array_unique($headers)
        );

        Schema::create(
            $tableName,
            function ($table) use ($headers) {

                $table->id();

                foreach ($headers as $header) {
                    $table->text($header)->nullable();
                }

                $table->timestamps();
            }
        );

        while (($row = fgetcsv($handle)) !== false) {

            if (count($row) !== count($headers)) {
                continue;
            }

            $data = [];

            foreach ($headers as $index => $header) {
                $data[$header] = $row[$index] ?? null;
            }

            DB::table($tableName)->insert($data);
        }

        fclose($handle);

        DatasetTable::create([
            'dataset_id' => $request->dataset_id,
            'name' => $request->table_name,
            'table_name' => $tableName,
            'description' => 'Imported CSV dataset table.',
        ]);

        return redirect()
            ->route('datasets.show', $request->dataset_id)
            ->with('success', 'CSV imported successfully.');
    }
}