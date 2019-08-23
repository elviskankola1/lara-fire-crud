<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        static::$db = self::firestoreDatabaseInstance();
    
    }

    public function index(){
        
        $docRef = self::$db->collection('users');
        $snapshot = $docRef->documents();
        $user = $snapshot;   
        return view ('dashboard', compact('user'));
    }

    public function create(){

        return view('user.create');
    }

    public function edit($id){
        //$id = '4Ee3sRyEaoMSJc9XCHfr';
        $docRef = self::$db->collection('users')->document($id);
        $docRef->set([
          'nama' => 'aul',
          'email' => 'aul@gmail.com',
          'pass' => '123458287'
        ]);
        printf('Edit data to the aturing document in the users collection.' . PHP_EOL);
      }
    
    public function store(Request $request){
        $docRef = self::$db->collection('users');
        $docRef->add([      
            'nama' => $request->nama,
            'email' => $request->email,
            'pass' => $request->password
        ]);

        return redirect('/dashboard');

    }
}
