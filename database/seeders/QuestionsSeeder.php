<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsSeeder extends Seeder
{
    public function run(): void
    {
        Question::insert([
            /*
            |--------------------------------------------------------------------------
            | BEGINNER
            |--------------------------------------------------------------------------
            */

            [
                'dataset_id' => 1,
                'title' => 'Select All Customers',
                'description' => 'Retrieve all records from the customer_shopping table.',
                'correct_sql' => 'SELECT * FROM customer_shopping;',
                'hint' => 'Use SELECT * to retrieve all columns.',
                'explanation' => 'The SELECT * statement retrieves every column and every row from the customer_shopping table.',
                'difficulty' => 'Beginner',
                'topic' => 'SELECT',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'dataset_id' => 1,
                'title' => 'Select Customer Names',
                'description' => 'Retrieve the customer name and gender from the customer_shopping table.',
                'correct_sql' => 'SELECT customer_name, gender FROM customer_shopping;',
                'hint' => 'Specify the two columns after SELECT.',
                'explanation' => 'SELECT customer_name, gender retrieves only the customer_name and gender columns.',
                'difficulty' => 'Beginner',
                'topic' => 'SELECT',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'dataset_id' => 1,
                'title' => 'Filter Female Customers',
                'description' => 'Retrieve all customers whose gender is Female.',
                'correct_sql' => "SELECT * FROM customer_shopping WHERE gender = 'Female';",
                'hint' => 'Use WHERE to filter rows based on gender.',
                'explanation' => "The WHERE clause filters the results so that only customers whose gender is 'Female' are returned.",
                'difficulty' => 'Beginner',
                'topic' => 'WHERE',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'dataset_id' => 1,
                'title' => 'Find Customers Above 30',
                'description' => 'Retrieve customers whose age is greater than 30.',
                'correct_sql' => 'SELECT * FROM customer_shopping WHERE age > 30;',
                'hint' => 'Use the greater-than operator with the age column.',
                'explanation' => 'The WHERE age > 30 condition returns only customers older than 30.',
                'difficulty' => 'Beginner',
                'topic' => 'WHERE',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'dataset_id' => 1,
                'title' => 'Sort Customers by Age',
                'description' => 'Retrieve all customers and sort them from youngest to oldest.',
                'correct_sql' => 'SELECT * FROM customer_shopping ORDER BY age ASC;',
                'hint' => 'Use ORDER BY with ASC.',
                'explanation' => 'ORDER BY age ASC sorts the records by age in ascending order, from youngest to oldest.',
                'difficulty' => 'Beginner',
                'topic' => 'ORDER BY',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            /*
            |--------------------------------------------------------------------------
            | INTERMEDIATE
            |--------------------------------------------------------------------------
            */

            [
                'dataset_id' => 1,
                'title' => 'Count Customers',
                'description' => 'Find the total number of customers in the customer_shopping table.',
                'correct_sql' => 'SELECT COUNT(*) AS total_customers FROM customer_shopping;',
                'hint' => 'Use COUNT(*) to count all rows.',
                'explanation' => 'COUNT(*) counts all records in the customer_shopping table and returns the total number of customers.',
                'difficulty' => 'Intermediate',
                'topic' => 'COUNT',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'dataset_id' => 1,
                'title' => 'Average Customer Age',
                'description' => 'Calculate the average age of all customers.',
                'correct_sql' => 'SELECT AVG(age) AS average_age FROM customer_shopping;',
                'hint' => 'Use the AVG function on the age column.',
                'explanation' => 'AVG(age) calculates the average value of the age column.',
                'difficulty' => 'Intermediate',
                'topic' => 'Aggregate Functions',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'dataset_id' => 1,
                'title' => 'Customers by Gender',
                'description' => 'Count how many customers belong to each gender.',
                'correct_sql' => 'SELECT gender, COUNT(*) AS total_customers FROM customer_shopping GROUP BY gender;',
                'hint' => 'Group the records using GROUP BY gender.',
                'explanation' => 'GROUP BY gender creates a group for each gender, while COUNT(*) counts the customers in each group.',
                'difficulty' => 'Intermediate',
                'topic' => 'GROUP BY',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'dataset_id' => 1,
                'title' => 'Total Purchase by Category',
                'description' => 'Calculate the total purchase amount for each category.',
                'correct_sql' => 'SELECT category, SUM(purchase_amount) AS total_purchase FROM customer_shopping GROUP BY category;',
                'hint' => 'Use SUM() together with GROUP BY.',
                'explanation' => 'SUM(purchase_amount) calculates the total spending for each category.',
                'difficulty' => 'Intermediate',
                'topic' => 'GROUP BY',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'dataset_id' => 1,
                'title' => 'Top Spending Customers',
                'description' => 'Display the top 10 customers based on purchase amount.',
                'correct_sql' => 'SELECT * FROM customer_shopping ORDER BY purchase_amount DESC LIMIT 10;',
                'hint' => 'Sort purchase_amount in descending order and use LIMIT.',
                'explanation' => 'ORDER BY purchase_amount DESC places the highest purchases first, while LIMIT 10 returns only the first 10 records.',
                'difficulty' => 'Intermediate',
                'topic' => 'ORDER BY',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            /*
            |--------------------------------------------------------------------------
            | ADVANCED
            |--------------------------------------------------------------------------
            */

            [
                'dataset_id' => 1,
                'title' => 'Categories with High Sales',
                'description' => 'Find categories whose total purchase amount is greater than 100000.',
                'correct_sql' => 'SELECT category, SUM(purchase_amount) AS total_purchase FROM customer_shopping GROUP BY category HAVING SUM(purchase_amount) > 100000;',
                'hint' => 'Use HAVING to filter grouped results.',
                'explanation' => 'HAVING filters the grouped results after SUM() has calculated the total purchase amount for each category.',
                'difficulty' => 'Advanced',
                'topic' => 'HAVING',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'dataset_id' => 1,
                'title' => 'Average Purchase by Gender',
                'description' => 'Find the average purchase amount for each gender and sort from highest to lowest.',
                'correct_sql' => 'SELECT gender, AVG(purchase_amount) AS average_purchase FROM customer_shopping GROUP BY gender ORDER BY average_purchase DESC;',
                'hint' => 'Use AVG(), GROUP BY, and ORDER BY.',
                'explanation' => 'AVG() calculates the average purchase for each gender. GROUP BY creates the gender groups, and ORDER BY sorts the averages from highest to lowest.',
                'difficulty' => 'Advanced',
                'topic' => 'Aggregate Functions',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'dataset_id' => 1,
                'title' => 'High-Value Customers',
                'description' => 'Find customers whose purchase amount is greater than the average purchase amount.',
                'correct_sql' => 'SELECT * FROM customer_shopping WHERE purchase_amount > (SELECT AVG(purchase_amount) FROM customer_shopping);',
                'hint' => 'Use a subquery to calculate the average purchase amount.',
                'explanation' => 'The subquery calculates the overall average purchase amount. The outer query then returns customers whose purchase is higher than that average.',
                'difficulty' => 'Advanced',
                'topic' => 'Subqueries',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'dataset_id' => 1,
                'title' => 'Highest Purchase by Category',
                'description' => 'Find the highest purchase amount recorded for each category.',
                'correct_sql' => 'SELECT category, MAX(purchase_amount) AS highest_purchase FROM customer_shopping GROUP BY category;',
                'hint' => 'Use MAX() and GROUP BY.',
                'explanation' => 'MAX(purchase_amount) finds the highest purchase amount within each category.',
                'difficulty' => 'Advanced',
                'topic' => 'Aggregate Functions',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'dataset_id' => 1,
                'title' => 'Category Sales Ranking',
                'description' => 'Calculate the total purchase amount for every category and display the categories from highest total to lowest total.',
                'correct_sql' => 'SELECT category, SUM(purchase_amount) AS total_purchase FROM customer_shopping GROUP BY category ORDER BY total_purchase DESC;',
                'hint' => 'Combine SUM(), GROUP BY, and ORDER BY.',
                'explanation' => 'SUM() calculates the total purchases for each category. GROUP BY creates one result per category, while ORDER BY sorts the totals from highest to lowest.',
                'difficulty' => 'Advanced',
                'topic' => 'GROUP BY',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}