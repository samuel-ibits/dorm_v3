<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'usefull' => 'required|string',
            'experience' => 'required|string',
            'newfeauture' => 'nullable|string',
            'mostvalue' => 'required|string',
            'mostused' => 'required|string',
            'teribleexp' => 'nullable|string',
            'improve' => 'nullable|string',
        ]);

        $userId = $request->query('t'); // or Auth::id() if using Laravel Auth

        $date = now()->format('Y-m-d h:i:sa');

        $body = "userid: {$userId}
            <br>Is this app useful to you (Yes/No): {$request->usefull}
            <br>Rate your experience using this app: {$request->experience}
            <br>New feature suggestion: {$request->newfeauture}
            <br>Most valuable part: {$request->mostvalue}
            <br>Most used feature: {$request->mostused}
            <br>Terrible experience: {$request->teribleexp}
            <br>Suggestions for improvement: {$request->improve}";

        // Insert into the 'suggest' table
        DB::table('suggestions')->insert([
            'user_id' => $userId,
            'submitted_at' => $date,
            'content' => $body,
        ]);

        return back()->with('success', 'Feedback submitted successfully.');
    }
}
