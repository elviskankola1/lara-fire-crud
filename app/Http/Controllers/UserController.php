<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        static::$db = self::firestoreDatabaseInstance();
    
    }

    public function index(){
        
        $docRef = self::$db->collection('users');
        $snapshot = $docRef->documents();
        $user = $snapshot;   
        return view ('user.index', compact('user'));
    }

    public function create(){

        return view('user.create');
    }

    public function store(Request $request){
        $docRef = self::$db->collection('users');
        $docRef->add([      
            'nickname' => $request->nama,
            'email' => $request->email,
            'pass' =>bcrypt($request->password) 
        ]);

        return redirect('/users');
    }
    
    public function edit($id){
        $docRef = self::$db->collection('users')->document($id);
        //$query = $docRef->where('id', '=', $id);
        $snapshot = $docRef->snapshot();
        $user = $snapshot;

        return view('user.edit', compact('user'));
    }

    public function update($id, Request $request){
        $docRef = self::$db->collection('users')->document($id);
        $snapshot = $docRef->snapshot();
        $user = $snapshot;
        $docRef->set([
          'nickname' => $request->nama,
          'email' => $request->email,
          'pass' => $request->get('password') ? bcrypt ($request->get('password')) : $user['pass']
        ]);

        return redirect('/users');
    }
    
    public function destroy($id){
        $docRef = self::$db->collection('users')->document($id);
        $docRef->delete();

        return redirect('/users');
    }
}
