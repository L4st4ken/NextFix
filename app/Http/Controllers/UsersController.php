<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    public function index(){
        return view('admin.user.index',[
            'user_fake' => user::latest()->get()  
        ]);
    }
    public function add(){
        return view('admin.user.insert');
    }
    public function insert(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Password::default()],
            'age' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:20'],
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'address' => $request->address,
            'country' => $request->country,
            'phone_number' => $request->phone_number,
        ]);
    }
    public function show($id){
        $user = User::findorfail($id);
        return view('admin.user.edit', compact('user'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . $id],
            'password' => ['nullable', Password::default()],
            'age' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:20'],
        ]);
        $user = User::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'address' => $request->address,
            'country' => $request->country,
            'phone_number' => $request->phone_number,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
    }
    public function delete($id){
        $user = User::findorfail($id);
        return view('admin.user.delete', compact('user'));
    }
    public function destroy($id){
        try{
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['message' => 'User deleted successfully.'], 200);

        }catch(\Exception $e){
            Log::error('Error deleting user: ' . $e->getMessage(), ['user_id' => $id]);
        }
        

    }
}
