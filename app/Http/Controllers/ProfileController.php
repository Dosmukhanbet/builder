<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Http\Requests;
use Illuminate\Http\Request;


class ProfileController extends Controller
{

    public function show()
    {
        return view('master.profile');
    }

    public function clientProfileShow()
    {
        return view('client.profileshow');
    }

    public function savePhoto(Request $request)
    {
        $this->validate($request, ['photo' => 'required']);
        $photo = $request->file('photo');

        $name = time().$photo->getClientOriginalName();

        $photo->move('profile/photos', $name);
        $path = 'profile/photos/' . $name;
        $thumb = sprintf("%sthumb-%s",'profile/photos/', $name);
        $this->makeThumbnail($path, $thumb);

        $user = Auth::user();
        $user->photo_path = $path;
        $user->thumbnail_path = $thumb;
        $user->save();
        return back();

    }





    public function makeThumbnail($path, $thumb)
    {
        Image::make($path)
            ->fit(75)
//            ->circle(80,50, 50, function ($draw) {
//                $draw->background('#fff');
//                $draw->border(5, '#ccc');
//            })
            ->save($thumb);
    }
}
