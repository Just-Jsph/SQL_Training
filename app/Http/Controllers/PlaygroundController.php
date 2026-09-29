<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaygroundController extends Controller
{
    public function index()
    {
        return view('playground.index');
    }

    public function execute(Request $request)
    {
        $request->validate([
            'sql' => 'required|string',
        ]);

        $sql = trim($request->sql);

        try {

            if (!preg_match(
                '/^(SELECT|WITH)\b/i',
                $sql
            )) {

                throw new \Exception(
                    'Only SELECT queries are allowed.'
                );
            }

            $blocked = [
                'INSERT',
                'UPDATE',
                'DELETE',
                'DROP',
                'ALTER',
                'TRUNCATE',
                'CREATE',
                'RENAME',
            ];

            foreach ($blocked as $keyword) {

                if (preg_match(
                    '/\b' . $keyword . '\b/i',
                    $sql
                )) {

                    throw new \Exception(
                        $keyword . ' statements are not allowed.'
                    );
                }
            }

            $results = DB::select($sql);

            return back()
                ->with('results', $results)
                ->with(
                    'success',
                    'Query executed successfully.'
                );

        } catch (\Throwable $e) {

            return back()->with(
                'sql_error',
                $e->getMessage()
            );
        }
    }
}