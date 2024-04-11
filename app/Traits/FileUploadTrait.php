<?php 

namespace App\Traits;
use Illuminate\Http\Request;
use File;

trait FileUploadTrait {

    function UploadImage(Request $request,$inputName,$oldPath = NULL,$path = "/upload"){
        if($request->hasFile($inputName)){

            $image = $request->{$inputName};
           $ext = $image->getClientOriginalExtension();
           $imageName = 'media_'.uniqid().'.'.$ext;
           $image->move(public_path($path),$imageName);

            // delete Preivis file if exist
           
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }
           return $path.'/'.$imageName;
        }
        return NULL;
    }

    function removeImage(string $path){

        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}





?>