<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
     {
         $users = user::orderBy('created_at', 'DESC')->get();
         // CODE DIATAS SAMA DENGAN > select * from `users` order by `created_at` desc
         return view('user.index', compact('users'));
     }
 
     public function create()
     {
        return view('user.create', ['user' => new \stdClass()]);
     }
 
     public function save(Request $request)
     {
        $request->validate([
             'name' => 'required|string|max:100',
             'email' => 'required|string',
             'password' => 'required|string',
             
         ]);
             //print_r($validator);exit();
         try
         {
             $user = user::create([
                 'name' => $request->name,
                 'email' => $request->email,
                 'password' => $request->password,
            
                
             ]);
             //print_r($user);exit();
             return redirect('/user')->with(['success' => '<strong>'.$user->title.'</strong> Telah Disimpan']);
         }
         catch(\Exception $e)
         {
             return redirect('/user/new')->with(['error' => $e->getMessage()]);
         }
     }
 
     public function edit($id)
     {
         $user = user::find($id);
         return view('user.edit', compact('user'));
     }
 
     public function update(Request $request, $id)
     {
         $user = user::find($id);
 
         $user->update([
            'no' => $request->no,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
         ]);
         return redirect('/user')->with(['success' => '<strong>'.$user->title.'</strong> Diperbaharui']);
     }
 
     public function destroy($id)
     {
         $user = user::find($id);
 
         $user->delete();
         return redirect('/user')->with(['success' => '<strong>'.$user->title.'</strong> Dihapus']);
     }
 }


