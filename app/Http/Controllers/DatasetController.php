<?php

namespace App\Http\Controllers;

use App\Models\Dataset;

class DatasetController extends Controller
{
    public function index()
    {
        $datasets = Dataset::with('tables')->get();

        return view('datasets.index', compact('datasets'));
    }

    public function show(int $id)
    {
        $dataset = Dataset::with('tables')->findOrFail($id);

        return view('datasets.table', compact('dataset'));
    }
}