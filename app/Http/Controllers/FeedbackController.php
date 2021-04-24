<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = (new Feedback())->getAll();
        return view('feedback.index', ['feedbacks' => $feedbacks]);
    }

    public function save(Request $request)
    {
        $feedback = $request->input('feedback');

        // save feedback
        $errors = (new Feedback())->add($feedback);

        if ($errors) {
            return redirect()->route('feedback::index')->with('errors', $errors);
        }

        return redirect()->route('feedback::index')->with('success', 'Отзыв добавлен успешно!');
    }
}
