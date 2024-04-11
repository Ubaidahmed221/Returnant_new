<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\SliderDataTable;
use App\Models\Slider;
use App\Http\Requests\Admin\SliderCreateRequest;
use App\Http\Requests\Admin\SliderUpdateRequest;
use App\Traits\FileUploadTrait;

class SliderController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderCreateRequest $request)
    {
        // handle image upload
        $imagePath = $this->UploadImage($request,'image');

        $slider = new Slider();
        $slider->image = $imagePath;
        $slider->offer = $request->offer;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->short_description = $request->short_description;
        $slider->button_link = $request->button_link;
        $slider->status = $request->status;
        $slider->save();

        toastr()->success('Slider Created Successfully');

        return to_route('admin.slider.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = slider::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id)
    {
        $slider = Slider::findOrFail($id);
       $imagePath =  $this->uploadImage($request,'image',$slider->image);
       $slider->image = !empty($imagePath) ? $imagePath : $slider->image;
       $slider->offer = $request->offer;
       $slider->title = $request->title;
       $slider->sub_title = $request->sub_title;
       $slider->short_description = $request->short_description;
       $slider->button_link = $request->button_link;
       $slider->status = $request->status;
       $slider->save();

       toastr()->success('Slider Updated Successfully');

       return to_route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $slider = slider::findOrFail($id);
            $this->removeImage($slider->image);
            $slider->delete();
            return response()->json(['status'=>'success','message' => 'Slider Deleted Successfully']);
        }
        catch(\Exception $ex){
            return response()->json(['status'=>'error','message' => $ex->getMessage()]);

        }
    }
}
