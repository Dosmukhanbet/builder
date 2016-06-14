<?php

namespace App\Http\Controllers;

use Auth;
use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Requests;

class FeedbackController extends Controller
{

    public function leave(Request $request)
    {
        $feedback = new Feedback;
        $feedback->body = $request['body'];
        $feedback->user_id = $request['user_id'];
        $feedback->from_user_id = Auth::user()->id;
        $feedback->save();

        return back();
    }
}
