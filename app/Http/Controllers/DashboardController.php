<?php
namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\UserProgress;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Total questions available
        $totalQuestions = Question::count();

        // Questions completed by the current user
        $completed = UserProgress::where('user_id', $userId)
            ->where('completed', true)
            ->count();

        // Questions that are not yet completed
        $remaining = max($totalQuestions - $completed, 0);

        // Total attempts made by the current user
        $attempts = UserProgress::where('user_id', $userId)
            ->sum('attempts');

        // Accuracy
        if ($attempts > 0) {
            $accuracy = round(($completed / $attempts) * 100);
        } else {
            $accuracy = 0;
        }

        return view('dashboard', compact(
            'totalQuestions',
            'completed',
            'remaining',
            'attempts',
            'accuracy'
        ));
    }
}