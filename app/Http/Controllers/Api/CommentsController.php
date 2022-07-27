<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Comment;
class CommentsController extends Controller
{
    public function store(Request $request)
    {   
        //variabile che accoglie tutti i dati che arrivano dalla rwquest
        $data = $request->all();

        //validazione dei dati che arrivano dalla request
        $validator = Validator::make($data,[
            'name' => 'nullable'|'string'|'max:50',
            'content' => 'string'|'required',
            'post_id' => 'exist:post,id'
        ]);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->erros(),
                'data' => $data
            ],400);
        }

        $newComment = new Comment();
        if(!empty($data['name'])){
            $newComment->name = $data['name'];
        }
        $newComment->content = $data['content'];
        $newComment->post_id = $data['content'];
        $newComment->save();

        return response()->json([
            'success' => true
        ]);
    }
        
}