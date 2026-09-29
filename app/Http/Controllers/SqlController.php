<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SqlController extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'sql' => 'required|string',
        ]);

        $question = Question::findOrFail(
            $request->question_id
        );

        $studentSql = trim($request->sql);

        try {

            $this->validateSql($studentSql);

            $studentResult = DB::select(
                $studentSql
            );

            $correctResult = DB::select(
                $question->correct_sql
            );

            $studentResult = $this->normalize(
                $studentResult
            );

            $correctResult = $this->normalize(
                $correctResult
            );

            $isCorrect =
                $studentResult === $correctResult;

            $progress = UserProgress::firstOrCreate(
                [
                    'user_id' => Auth::id(),
                    'question_id' => $question->id,
                ],
                [
                    'attempts' => 0,
                    'completed' => false,
                ]
            );

            $progress->increment('attempts');

            if ($isCorrect) {

                $progress->update([
                    'completed' => true,
                    'completed_at' => now(),
                ]);

                return back()
                    ->with(
                        'success',
                        'Correct! Your SQL answer is correct.'
                    )
                    ->with(
                        'show_explanation',
                        true
                    );
            }

            return back()->with(
                'error',
                'Incorrect. Try again.'
            );

        } catch (\Throwable $e) {

            return back()->with(
                'sql_error',
                $e->getMessage()
            );
        }
    }

    public function execute(Request $request)
    {
        $request->validate([
            'sql' => 'required|string',
        ]);

        $sql = trim($request->sql);

        try {

            $this->validateSql($sql);

            $results = DB::select($sql);

            return back()
                ->with('results', $results)
                ->with('sql', $sql);

        } catch (\Throwable $e) {

            return back()->with(
                'sql_error',
                $e->getMessage()
            );
        }
    }

    private function validateSql(string $sql): void
    {
        $sql = trim($sql);

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
    }

    private function normalize(array $results): array
    {
        $results = array_map(
            function ($row) {

                $row = (array) $row;

                ksort($row);

                return $row;
            },
            $results
        );

        usort(
            $results,
            function ($a, $b) {

                return strcmp(
                    json_encode($a),
                    json_encode($b)
                );
            }
        );

        return $results;
    }
}