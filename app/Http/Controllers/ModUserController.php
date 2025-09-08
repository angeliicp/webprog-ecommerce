<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ModUserController extends Controller
{
    public function index() {
        $users = User::get();

        $data = [
            'users' => $users,
        ];

        return view('admin.u_adm_index', $data);
    }

    public function show($id) {
        $user = User::findOrFail($id);

        $data = [
            'user' => $user,
        ];

        return view('admin.u_adm_show', $data);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'is_banned' => 'required|boolean',
        ]);

        User::where('user_id', $id)->update($validated);

        return back();
    }
}
