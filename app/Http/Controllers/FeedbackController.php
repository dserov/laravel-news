<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveFeedbackRequest;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback.index', ['feedbacks' => Feedback::all()]);
    }

    public function save(SaveFeedbackRequest $request)
    {
        // save feedback
        $feedbackModel = new Feedback();
        $feedbackModel->fill($request->input('feedback'));

        if (!$feedbackModel->save()) {
            return redirect()->route('feedback::index')->withErrors(['Не удалось сохранить!'])->withInput();
        }

        return redirect()->route('feedback::index')->with('success', 'Отзыв добавлен успешно!');
    }
}
