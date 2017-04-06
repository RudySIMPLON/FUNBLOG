<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
 
	public function profil(){
	
	return view('profil');
	}

	public function returnForm($id){
		$users=User::find($id);
         
	return view('formEditProfil',['users'=>$users]);
		// dd("popo");

	}

	public function ValidEdit($id,Request $request) {
		
		$users = User::find($id);
      	$users->name = $request->name;
		$users->email= $request->email;
		$users->password= Hash::make($request->password);
		$users->save();
		
		return view('profil');
			}

}