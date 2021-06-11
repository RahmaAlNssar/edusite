<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Http\Requests\SliderImageRequest;
use App\DataTables\SliderImageDataTable;
use App\Traits\UploadFile;
use App\Models\SliderImage;
use App\Models\Page;
class SliderImageController extends BackendController
{
    use UploadFile;
   
    public function __construct(SliderImageDataTable $dataTable,SliderImage $slider){
        parent::__construct($dataTable,$slider);
    }


    public function append(){
        return [
        'pages'=>Page::all(),
          'no_ajax' => ''
        ];
    }
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderImageRequest $request)
    {
        try {
            SliderImage::create($request->except(['id']));
            toast('Your image has been created!', 'success');
                return response()->json(['redirect' => route('backend.sliders.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderImageRequest $request, SliderImage $slider)
    {
        try {
            if ($request->has('image'))
            $this->remove($slider->image, 'sliders');
            $slider->update($request->except(['id']));
            toast('Your Image has been updated!', 'success');
                return response()->json(['redirect' => route('backend.sliders.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

  
}
