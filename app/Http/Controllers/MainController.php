<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function test(Request $request): object
    {
        return \response()
            ->json(['status' => true, 'message' => $request->all()], 201)
            ->header('Content-Type', 'text/plain');
    }
}
