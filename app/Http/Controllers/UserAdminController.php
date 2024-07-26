<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    public static function ShowUserAmin(){
        $users = User::UserAdminAll();
        return view('admin.useradmin', compact('users'));
    }
    public function create()
    {
        return view('admin.categoryadmin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'role' => 'required|integer',
        ]);

        $data = $request->only(['name', 'email', 'phone_number', 'password', 'role']);
        $data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect()->route('admin.useradmin')->with('success', 'Thêm người dùng thành công!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $users = User::UserAdminAll();
        return view('user.edit', compact('User'));
    }

    public function update(Request $request, $id)
    {
        $category = User::findOrFail($id);
        $data = $request->only(['role']);
        
        $category ->update($data);
        return redirect()->route('admin.useradmin')->with('success', 'User updated successfully!');
    }
    
    public function lockUser($id)
    {
        $user = User::findOrFail($id);
        $user->locked = true;
        $user->save();
        return redirect()->back()->with('success', 'Tài khoản đã được khóa.');
    }

    public function unlockUser($id)
    {
        $user = User::findOrFail($id);
        $user->locked = false;
        $user->save();
        return redirect()->back()->with('success', 'Tài khoản đã được mở khóa.');
    }
}
