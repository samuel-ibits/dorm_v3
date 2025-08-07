<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class MarketDashboardController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->query('t') ?? Cookie::get('dormtoken');
        $userId = $this->validateToken($token);

        if ($userId === null) {
            return Redirect::away('https://dorm.com.ng/market/v1');
        }

        // Get user profile
        $profile = DB::connection('mysql6')
            ->table('profile')
            ->where('Id', $userId)
            ->first();

        // Check vendor status
        $agent = DB::connection('mysql20')
            ->table('agent')
            ->where('id', $userId)
            ->first();

        if (!$agent) {
            $status = 'not_submitted';
        } elseif ($agent->status === 'pending') {
            return Redirect::away("https://dorm.com.ng/market/v1/pay.php?t={$token}")
                ->with('alert', 'Your dashboard is still pending approval');
        } else {
            $status = 'approved';
        }

        $year = now()->year;

        $products = DB::connection('mysql20')
            ->table('products')
            ->where('userid', $userId)
            ->get();

        $orders = DB::connection('mysql20')
            ->table('orders')
            ->where('userid', $userId)
            ->get();

        $totalProductPrice = DB::connection('mysql20')
            ->table('products')
            ->where('userid', $userId)
            ->sum('price');

        $yearlyOrderValue = DB::connection('mysql20')
            ->table('orders')
            ->where('userid', $userId)
            ->where('year', $year)
            ->sum('price');

        return view('market.dashboard', [
            'token' => $token,
            'userId' => $userId,
            'profile' => $profile,
            'status' => $status,
            'products' => $products,
            'orders' => $orders,
            'totalProductPrice' => $totalProductPrice,
            'yearlyOrderValue' => $yearlyOrderValue,
        ]);
    }

    private function validateToken($token)
    {
        // Replace with real validation logic, mock for now:
        if (!$token || $token === 'invalid') {
            return null;
        }
        // Example logic:
        return DB::table('tokens')->where('token', $token)->value('user_id');
    }
}
