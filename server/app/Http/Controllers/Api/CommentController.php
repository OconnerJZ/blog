<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index()
    {
        $posts = Comment::with('user')->get();
        return response()->json($posts, 200);
    }

    public function store(Request $request)
    {

        $input = $request->all();

        $validator = Validator::make($input, [
            'body' => 'required',
            'user_id' => 'required',
            'post_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $post = Comment::create([
            'body' => $request->input('body'),
            'user_id' => $request->input('user_id'),
            'post_id' => $request->input('post_id')
        ]);

        return response()->json($post, 201);
    }
}