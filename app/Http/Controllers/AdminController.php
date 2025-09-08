<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $usersTotal = User::count();
        $custTotal = User::where('role', 'Buyer')->count();

        $data = [
            'usersTotal' => $usersTotal,
            'custTotal' => $custTotal,
        ];

        return view('dashboard.adm_dashboard', $data);
    }
}
