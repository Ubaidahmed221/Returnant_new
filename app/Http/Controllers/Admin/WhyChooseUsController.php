<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\WhyChooseUsDataTable;
use App\Models\SectionTitle;
use App\Models\WhyChooseUs;
use App\Http\Requests\Admin\WhyChooseUsCreateRequest;


class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WhyChooseUsDataTable $dataTabe)
    {
        $keys = ['Why_chosse_us_top_title','Why_chosse_us_Mian_title','Why_chosse_us_Sub_title'];
       $titles = SectionTitle::whereIn('key',$keys)->pluck('value','key');
        return $dataTabe->render('admin.why-choose-Us.index',compact('titles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.why-choose-Us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WhyChooseUsCreateRequest $request)
    {
        WhyChooseUs::create($request->validated());
        // WhyChooseUs::create([
        //     'icon' => $request->icon,
        //     'title' => $request->title,
        //     'short_description' => $request->short_description,
        //     'status' => $request->status
        // ]);
        toastr()->success('Item Created Successfully!');
            return to_route('admin.why-choose-us.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function updateTitle(Request $request){
        $request->validate([
            'top_title' => ['max:100'],
            'main_title' => ['max:200'],
            'sub_title' => ['max:300']
        ]);
        SectionTitle::updateOrCreate(
            ['key' => 'Why_chosse_us_top_title'],
            ['value' => $request->top_title]
        );
        SectionTitle::updateOrCreate(
            ['key' => 'Why_chosse_us_Mian_title'],
            ['value' => $request->main_title]
        );
        SectionTitle::updateOrCreate(
            ['key' => 'Why_chosse_us_Sub_title'],
            ['value' => $request->sub_title]
        );

        toastr()->success('Title Update Successfully');
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
