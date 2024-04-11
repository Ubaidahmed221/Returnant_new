<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Http\Requests\Admin\ProfilePasswordUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Traits\FileUploadTrait;
use Auth;

class ProfileController extends Controller
{
    use FileUploadTrait;

    public function index(): View{
        return view('admin.Profile.index');

    }

   public function updateProfile(ProfileUpdateRequest $request): RedirectResponse{

   $imagePath = $this->UploadImage($request,'avatar');

   $user = Auth::user();
   $user->name = $request->name;
   $user->email = $request->email;
   $user->avatar = isset($imagePath) ? $imagePath : $user->avatar;
   $user->save();

   toastr('Profile  Updated Successfully!','success');

        return redirect()->back();

    }


    public function updatePassword(ProfilePasswordUpdateRequest $request) : RedirectResponse{

        $user = Auth::User();
        $user->password = bcrypt($request->password);
        $user->save();
        toastr('Password Updated Successfully!','success');
        return redirect()->back();

    }
}
