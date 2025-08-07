<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class MarketGridController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->query('t') ?? Cookie::get('dormtoken');
        $userId = $this->validateToken($token);

        if ($userId === null) {
            return Redirect::away('https://dorm.com.ng/market/v1');
        }

        $products = DB::connection('mysql20')
            ->table('products')
            ->orderByDesc('id')
            ->get();

        return view('market.grid', [
            'products' => $products,
            'userId' => $userId,
            'token' => $token,
        ]);
    }

    private function validateToken($token)
    {
        if (!$token || $token === 'invalid') {
            return null;
        }

        return DB::table('tokens')->where('token', $token)->value('user_id');
    }
}
