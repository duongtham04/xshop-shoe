<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                $filePath = public_path($user->avatar);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $image = $request->file('avatar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'avatar/' . $imageName;
            $image->move(public_path('avatar'), $imageName);
            $user->avatar = $imagePath;
        }

        $data = $request->only('name', 'email', 'phone_number', 'address');
        User::updateUsers($user, $data);

        return redirect()->back()->with('success', 'Thông tin hồ sơ đã được cập nhật thành công.');
    }
}