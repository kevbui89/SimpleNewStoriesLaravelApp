<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use Auth;

class ApiController extends Controller
{
    public function index()
    {
        $stories = Story::all()->sortByDesc('created_at');
        return response()->json($stories, 200);
    }

    public function byauthor(Request $request)
    {
        //check credentials
        $credentials = $request->only('email', 'password');
        $valid = Auth::once($credentials); //logs in for single request

        if (!$valid)
            return response()->json(['error' => 'invalid_credentials'], 401);
        else {
            $stories = Story::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            return response()->json($stories, 200);
        }
    }


}
