<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('dataset')
            ->latest()
            ->get();

        $topics = Question::whereNotNull('topic')
            ->where('topic', '!=', '')
            ->distinct()
            ->orderBy('topic')
            ->pluck('topic');

        return view('questions.index', compact(
            'questions',
            'topics'
        ));
    }

    public function create()
    {
        $datasets = Dataset::all();

        return view('questions.create', compact('datasets'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dataset_id' => 'required|exists:datasets,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'correct_sql' => 'required|string',
            'hint' => 'nullable|string',
            'explanation' => 'nullable|string',
            'difficulty' => 'required|in:Beginner,Intermediate,Advanced',
            'topic' => 'required|string|max:255',
        ]);

        Question::create($validated);

        return redirect()
            ->route('questions.index')
            ->with('success', 'Question created successfully.');
    }

    public function show(int $id)
    {
        $question = Question::with('dataset')
            ->findOrFail($id);

        return view('questions.show', compact('question'));
    }

    public function edit(int $id)
    {
        $question = Question::findOrFail($id);

        $datasets = Dataset::all();

        return view('questions.edit', compact(
            'question',
            'datasets'
        ));
    }

    public function update(Request $request, int $id)
    {
        $question = Question::findOrFail($id);

        $validated = $request->validate([
            'dataset_id' => 'required|exists:datasets,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'correct_sql' => 'required|string',
            'hint' => 'nullable|string',
            'explanation' => 'nullable|string',
            'difficulty' => 'required|in:Beginner,Intermediate,Advanced',
            'topic' => 'required|string|max:255',
        ]);

        $question->update($validated);

        return redirect()
            ->route('questions.index')
            ->with('success', 'Question updated successfully.');
    }

    public function destroy(int $id)
    {
        $question = Question::findOrFail($id);

        $question->delete();

        return redirect()
            ->route('questions.index')
            ->with('success', 'Question deleted successfully.');
    }
}