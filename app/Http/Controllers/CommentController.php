<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request){
        $valite =$this->validate($request,[
            'image_id'=>'integer|required',
            'content' => 'string|required'
        ]);

    	$image_id = $request->input('image_id');
    	$content = $request->input('content');


    }

}
