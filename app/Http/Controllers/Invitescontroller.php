<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class Invitescontroller extends Controller
{

    public function all()
    {
        $invites = Auth::user()->invites;
        return view('master.invites', compact('invites'));

    }

}
