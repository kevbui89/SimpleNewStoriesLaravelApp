<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::orderBy('created_at', 'DESC') ->paginate(5);
        return view('home.index', [
            'stories' => $stories,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'post' => 'required|max:255',
        ]);

        $request->user()->stories()->create([
            'title' => $request->title,
            'post' => $request->post,
        ]);

        return redirect('/');
    }

    /**
     * @param Request $request
     * @param Story $story
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Story $story)
    {
        $this->authorize('destroy', $story);

        $story->delete();
        return redirect('/');

    }


}
