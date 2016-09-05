<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Image;
use App\User;
use App\Offer;
use App\Invite;
use App\Skills;
use App\Attachment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;


class ProfileController extends Controller
{

    public function show()
    {
        $clients = User::where('type', 'client')->lists('name', 'id');
        $feedbacks = Auth::user()->feedbacks()->paginate(10);

        return view('master.profile.show', compact('feedbacks', 'clients'));
    }

    public function clientProfileShow()
    {
        return view('client.profileshow');
    }


    public function feedbackCreate()
    {
        $invites = Invite::where('from_user_id', Auth::user()->id)->pluck('user_id')->unique()->toArray();
        $offers = Offer::whereIn('job_id', Auth::user()->jobs->pluck('id'))->pluck('user_id')->unique()->toArray();;
        $merged = array_merge($offers, $invites);


        $masters = DB::table('users')
            ->whereIn('id', collect($merged)->unique())
            ->paginate(8);

        return view('client.leavefeedback', compact('masters'));
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
        flash()->success('ok', 'Фотография успешно добавлена!');
        return redirect('master/addskills');        
    }

    public function addSkills ()
    {
        return view('master.addskills');        
    } 


    public function saveSkills(Request $request)
    {
         $this->validate($request, [
            'years' => 'required|numeric',
            'intro'=> 'required|min:20',
        ]);
        $skills = new Skills;
        $skills->years = $request['years'];
        $skills->intro = $request ['intro'];
        $user = Auth::user();
        $user->addSkills($skills);
        flash()->success('Ваши данные сохранены!', 'Добавьте вложения');
        return redirect('master/attachments');

    } 

    public function attachments ()
    {
        return view('master.attachments');
    } 

    public function saveAttachments (Request $request)
    {
        $file = $request->file('attachment');
        $name = time().$file->getClientOriginalName();
        $file->move('user/attachments', $name);
        $path = 'user/attachments/' . $name;
        $thumb = sprintf("%s/thumb-%s",'user/attachments', $name);
        $this->makeThumbnail($path, $thumb, 120);
        $attachment = new Attachment;
        $attachment->user_id = Auth::user()->id;
        $attachment->path = $path;
        $attachment->thumbnail_path = $thumb;
        $attachment->save();

    } 


    
    public function update(Request $request, $userid)
    {
        $this->validate($request, [
            'name' => 'required',
            'email'=> 'required|email',
            'city_id'=>'required',
            'category_id' => 'required'
        ]);

        $user = User::findOrFail($userid);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->city_id = $request['city_id'];
        $user->category_id = $request['category_id'];
        $user->save();

        flash()->success('ok', 'Профиль успешно отредактирован!');
        return back();
    }

    public function addPhoto ()
    {
        return view('master.addphoto');
    } 


    public function makeThumbnail($path, $thumb, $size = 75)
    {
        Image::make($path)
            ->fit($size)
//            ->circle(80,50, 50, function ($draw) {
//                $draw->background('#fff');
//                $draw->border(5, '#ccc');
//            })
            ->save($thumb);
    }
}
