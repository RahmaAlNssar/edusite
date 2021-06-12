<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\DataTables\SlidersDataTable;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Traits\UploadFile;
use App\Models\Slider;
use App\Models\SliderImage;
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

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $slider = Slider::create($request->only('name'));
            foreach ($request->slices as $slice)
                SliderImage::create(array_merge($slice, ['slider_id' => $slider->id]));
            DB::commit();
            toast('Your image has been created!', 'success');
            return response()->json(['redirect' => route('backend.sliders.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function update(Request $request, Slider $slider)
    {
        try {
            $slider->update($request->all());
            foreach ($request->slices as $slice) {
                $row = SliderImage::findOrFail($slice['id']);
                if ($slice['image'])
                    $this->remove($row->image, 'sliders');
                $row->update($slice);
            }
            toast('Your Slider has been updated!', 'success');
            return response()->json(['redirect' => route('backend.sliders.index')]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
