<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\DataTables\SlidersDataTable;
use App\Http\Requests\SliderRequest;
use App\Traits\UploadFile;
use App\Models\Slider;
use Exception;

class SlidersController extends BackendController
{
    use UploadFile;

    public function __construct(SlidersDataTable $dataTable, Slider $slider)
    {
        parent::__construct($dataTable, $slider);
    }

    public function append()
    {
        return ['no_ajax' => ''];
    }

    public function store(SliderRequest $request)
    {
        dd($request->all());
        try {
            $slider = Slider::create($request->all());
            $slider->images()->attach($request->except(['id', 'name']));
            toast('Your image has been created!', 'success');
            return response()->json(['redirect' => route('backend.sliders.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        try {
            $slider->update($request->all());
            $slider->images()->sync($request->all());
            toast('Your Slider has been updated!', 'success');
            return response()->json(['redirect' => route('backend.sliders.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
