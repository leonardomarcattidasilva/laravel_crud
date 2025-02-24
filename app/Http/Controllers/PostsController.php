<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostsModel;

class PostsController extends Controller
{
    public function create(Request $r): object
    {
        $post = $r->all();
        // dd($post);
        $model = new PostsModel($post);
        $status = $model->save();
        if ($status) {
            return \response()->json(['status' => true, 'message' => 'Post saved!'], 200);
        }

        return \response()->json(['status' => false, 'message' => 'Post not saved!'], 500);
    }

    public function delete(Request $r): object
    {
        $id = $r->id;
        $model = new PostsModel();
        $post = $model->find($id);
        if ($post) {
            $post->delete();
            return \response()->json(['status' => true, 'message' => 'Post deleted!'], 200);
        }

        return \response()->json(['status' => false, 'message' => 'Post not deleted!'], 404);
    }

    public function readAll(): object
    {
        $post = new PostsModel();
        return $post->all();
    }

    public  function read(Request $r): object
    {
        $id = $r->id;
        $post = PostsModel::find($id);

        if ($post) {
            return $post;
        }

        return \response()->json(['status' => false, 'message' => 'Post not found!'], 404);
    }

    public function update(Request $r): object
    {
        $data = $r->all();
        $post = PostsModel::find($r->id);
        if ($post) {
            $post->update($data);
            return \response()->json(['status' => true, 'message' => 'Post updated'], 200);
        }

        return \response()->json(['status' => false, 'message' => 'Post not found!'], 404);
    }
}
