<?php

namespace Database\Seeders;

use App\Models\Dataset;
use Illuminate\Database\Seeder;

class DatasetSeeder extends Seeder
{
    public function run(): void
    {
        Dataset::updateOrCreate(
            [
                'slug' => 'customer-shopping',
            ],
            [
                'name' => 'Customer Shopping Dataset',
                'description' =>
                    'Customer shopping transactions for SQL practice.',
            ]
        );
    }
}