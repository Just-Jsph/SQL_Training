<?php

namespace Database\Seeders;

use App\Models\Dataset;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $dataset = Dataset::where(
            'slug',
            'customer-shopping'
        )->first();

        if (!$dataset) {
            return;
        }

        Question::updateOrCreate(
            [
                'title' => 'Find Female Customers',
            ],
            [
                'dataset_id' => $dataset->id,

                'description' =>
                    'Show all records where the gender is Female.',

                'correct_sql' =>
                    "SELECT * FROM customer_shopping WHERE gender = 'Female'",

                'hint' =>
                    'Use WHERE to filter the gender column.',

                'explanation' =>
                    'The WHERE clause filters records based on a condition. Here it keeps only rows where gender is Female.',

                'difficulty' => 'Beginner',

                'topic' => 'WHERE',
            ]
        );

        Question::updateOrCreate(
            [
                'title' => 'Sort Customers by Age',
            ],
            [
                'dataset_id' => $dataset->id,

                'description' =>
                    'Show all customers ordered from youngest to oldest.',

                'correct_sql' =>
                    'SELECT * FROM customer_shopping ORDER BY age ASC',

                'hint' =>
                    'Use ORDER BY and sort age in ascending order.',

                'explanation' =>
                    'ORDER BY age ASC sorts the records from the smallest age to the largest age.',

                'difficulty' => 'Beginner',

                'topic' => 'ORDER BY',
            ]
        );

        Question::updateOrCreate(
            [
                'title' => 'Total Quantity by Category',
            ],
            [
                'dataset_id' => $dataset->id,

                'description' =>
                    'Calculate the total quantity purchased for each category.',

                'correct_sql' =>
                    'SELECT category, SUM(quantity) AS total_quantity FROM customer_shopping GROUP BY category',

                'hint' =>
                    'Use SUM() together with GROUP BY.',

                'explanation' =>
                    'SUM calculates the total quantity, while GROUP BY creates a separate total for each category.',

                'difficulty' => 'Intermediate',

                'topic' => 'GROUP BY',
            ]
        );
    }
}