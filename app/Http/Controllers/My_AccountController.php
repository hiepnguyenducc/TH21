<?php

namespace App\Http\Controllers;
use App\Http\Model\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class My_AccountController extends Controller
{
    public function my_account()
    {
        // Get the authenticated user
        $user = Auth::user();
    
        // Pass the user data to the view
        return view('users.my_account', compact('user'));
    }
    public function getUserByID($id){
        $user = User::find($id);
    
        if (!$user) {
            // Handle the case where the user with the given ID is not found
            return redirect()->back()->with('error', 'User not found.');
        }
    
        // Assuming you want to redirect to some route after finding the user
        // Replace 'route.name' with the name of the route you want to redirect to
        return redirect()->route('route.my_account', ['user' => $user])->with('success', 'User found successfully.');
    }
    public function update(Request $request)
    {
        // Validate input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);
    
        // Update user details
        $user = Auth::user();
        $user->name = $request->name;
        $user->image = $request->image;
        $user->phone = $request->phone;
        $user->email = $request->email;
    
        // Save the updated user
        $user->save();
    
        // Redirect back with success message
        return view('users.my_account', ['user' => $user])->with('success', 'Account updated successfully.');
    }
    
    
}
