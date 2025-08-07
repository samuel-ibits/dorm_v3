<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class ManageProductController extends Controller
{
    public function index(Request $request)
    {
        // Get token from GET param or cookie
        $token = $request->query('t') ?? Cookie::get('dormtoken');

        // Validate token using your own validation function
        $userId = $this->validateToken($token);

        if ($userId === 'null' || $userId === null) {
            return Redirect::away('https://dorm.com.ng/v2.5/app');
        }

        // Optional: Load user-specific data here if needed
        return view('manageproduct', compact('userId'));
    }

    // Simulate the token validator (replace with your logic)
    private function validateToken($token)
    {
        // TODO: Replace with actual token verification
        if ($token === 'validtoken123') {
            return 1; // Sample user ID
        }

        return 'null';
    }
}
