<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function userslist()
    {
        $users = User::select('id','name','email','created_at')->get();
        return datatables()->of($users)
            ->addColumn('action', function ($user) {
                return '<button class="btn btn-sm btn-primary editUser"
                            data-id="'.$user->id.'"
                            data-name="'.$user->name.'"
                            data-email="'.$user->email.'">
                        Edit</button>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function updateuser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name','email'));

        return response()->json(['message' => 'User updated']);
    }
}
