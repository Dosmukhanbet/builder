<?php

namespace App\Http\Controllers;

use Auth;
use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Requests;

class FeedbackController extends Controller
{

    public function leave(Request $request, $masterId)
    {
        dd($request->all());

        $feedback = new Feedback;
        $feedback->body = $request['body'];
        $feedback->user_id = (int)$masterId;
        $feedback->from_user_id = Auth::user()->id;
        $feedback->save();

        flash()->success('Спасибо!', 'Ваш отзыв добавлен!');
        return back();
    }
}
