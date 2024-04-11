<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Http\Requests\Frontend\ProfilePasswordUpdateRequest;
use App\Traits\FileUploadTrait;
use Auth;

class ProfileUpdateController extends Controller
{
    use FileUploadTrait;
    public function updateProfile(ProfileUpdateRequest $request) : RedirectResponse{
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Profile Update Successfully!');

        return redirect()->back();
    }

    public function updatePassword(ProfilePasswordUpdateRequest $request) : RedirectResponse{
        $user = Auth::User();
        $user->password = bcrypt($request->password);
        $user->save();
        toastr('Password Updated Successfully!','success');
        return redirect()->back();
    }

    public function updateavatar(Request $request){

        $user = Auth::user();
        $imagePath = $this->UploadImage($request,'avatar');
        $user->avatar = $imagePath;
        $user->save();

        return response(['status' => 'success','message'=> 'Profile Image Update successfully']);
    }
}
