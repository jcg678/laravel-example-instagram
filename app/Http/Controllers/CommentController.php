<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

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

        $user = \Auth::user();
        $image_id=$request->input('image_id');
        $content = $request->input('content');

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;


        $comment->save();

        return redirect()->route('image.detail',['id'=>$image_id])
                ->with([
                    'message'=>'Has publicado tu comentario correctamente'
                ]);
    }

}
