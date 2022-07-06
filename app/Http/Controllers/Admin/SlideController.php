<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Models\Slide;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class SlideController extends Controller
{
    use StorageImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slide = Slide::all();
        return view('admin.slide.index',compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request)
    {
        //
        try {
            DB::beginTransaction();
            // $data = [
            //     'title' => $request->title,
            //     'description' => $request->description
            // ];
            $dataImageSlide = $this->storageTraitUploadSlide($request , 'image', 'slides');
            $slide  = new Slide();
            $slide->title = $request->title;
            $slide->description = $request->description;

            if( !empty($dataImageSlide)) {
                // $data['image_name'] = $dataImageSlide['file_name'];
                // $data['image_path'] = $dataImageSlide['file_path'];
                $slide->image_name = $dataImageSlide['file_name'];
                $slide->image_path =$dataImageSlide['file_path'];
            }
            // $slide->create($data);
            // $slide->save();
            // dd($slide);
            $slide->save();
            DB::commit();          
            Alert::success('Success', 'ADD Slide Done');
            return redirect()->back();

        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            Log::error("message" . $e->getMessage() . 'line:' . $e->getLine());
        }
       


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $slide = Slide::find($id);
        return view('admin.slide.edit',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlideRequest $request, $id)
    {
        //
         //
         try {
            DB::beginTransaction();
            // $data = [
            //     'title' => $request->title,
            //     'description' => $request->description
            // ];
            $dataImageSlide = $this->storageTraitUploadSlide($request , 'image', 'slides');
            $slide  = Slide::find($id);
            $slide->title = $request->title;
            $slide->description = $request->description;

            if( !empty($dataImageSlide)) {
                // $data['image_name'] = $dataImageSlide['file_name'];
                // $data['image_path'] = $dataImageSlide['file_path'];
                $slide->image_name = $dataImageSlide['file_name'];
                $slide->image_path =$dataImageSlide['file_path'];
            }
            // $slide->create($data);
            // $slide->save();
            // dd($slide);
            $slide->save();
            DB::commit();          
            Alert::success('Success', 'EDIT Slide Done');
            return redirect()->back();

        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            Log::error("message" . $e->getMessage() . 'line:' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Slide::find($id)->delete();
        Alert::success('Success', 'Delete Slide Done');
        return redirect()->back();
    }
}
