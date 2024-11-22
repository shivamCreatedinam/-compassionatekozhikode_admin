<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('SuperAdmin.users', $users);
    }

    public function blockUser($id){
        dd($id);
    }

    public function editUser($id){
        try{
            $user = User::find($id);
            if($user){
                return view('SuperAdmin.edit_user',compact('user'));
            }
        } catch( Exception $e){
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function updateUser(Request $request, $id){
         $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'mobile_number' => 'required|integer',
         ]);

          $user = User::findOrFail($id);
        // Update logic for images and other fields
        // ...

        $user->update($validatedData);

        return redirect()->route('sadmin.all_users')->with('success', 'User updated successfully.');
    }
}
