<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback.index');
    }

    public function save(Request $request)
    {
        $feedback = $request->input('feedback');
//        dd($feedback);
        // save feedback

        return redirect()->route('feedback::index');
    }
}
