<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ModController extends Controller
{
    public function dashboard() {
        $usersTotal = User::count();
        $custTotal = User::where('role', 'Buyer')->count();
        $bannedUser = User::where('role', 'Buyer')->where('is_banned', 1)->count();
        $unlistedProd = Product::where('is_listed', 0)->count();

        $data = [
            'usersTotal' => $usersTotal,
            'custTotal' => $custTotal,
            'bannedUser' => $bannedUser,
            'unlistedProd' => $unlistedProd,
        ];

        return view('dashboard.mod_dashboard', $data);
    }
}
