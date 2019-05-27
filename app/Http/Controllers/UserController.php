<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function config(){
    	return view('user.config');
    }

    public function update(Request $request){
    	$user = \Auth::user();
    	$id = $user->id;
    	$validate =$this->validate($request,[
    		'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick'=>'required|string|max:255|unique:users,nick,'.$id,
            //'nick' => ['required', 'string', 'max:255'],
            'email'=>'required|string|max:255|unique:users,email,'.$id,            
            //'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    	]);	



    	$name=$request->input('name');
    	$surname=$request->input('surname');
    	$nick=$request->input('nick');
    	$email=$request->input('email');


    	$user->name = $name;
    	$user->surname = $surname;
    	$user->nick = $nick;
    	$user->email = $email;

		//subir a imagen
		$image_path=$request->file('image_path');
		if($image_path){
			$image_path_name = time().$image_path->getClientOriginalName();
			Storage::disk('users')->put($image_path_name, File::get($image_path));

			$user->image = $image_path_name; 	
		}


    	$user->update();

    	return redirect()->route('config')->with([
    		'message'=>'Usuario Actulizado Correctamente',

    	]);


    }	
}
