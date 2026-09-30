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
        'sql' => 'required|string|max:10000',
    ]);

    $sql = trim($request->sql);

    try {

        // Only SELECT and WITH queries
        if (!preg_match('/^(SELECT|WITH)\b/i', $sql)) {
            throw new \Exception(
                'Only SELECT queries are allowed.'
            );
        }

        // Block dangerous commands
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

            if (preg_match('/\b' . $keyword . '\b/i', $sql)) {

                throw new \Exception(
                    $keyword . ' statements are not allowed.'
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Limit result size
        |--------------------------------------------------------------------------
        */

        $sqlWithoutSemicolon = rtrim($sql, " \t\n\r;");

        // If the query does not have LIMIT, add LIMIT 100
        if (!preg_match('/\bLIMIT\s+\d+/i', $sqlWithoutSemicolon)) {

            $sql = $sqlWithoutSemicolon . ' LIMIT 100';
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