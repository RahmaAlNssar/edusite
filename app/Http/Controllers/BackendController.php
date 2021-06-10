<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
class BackendController extends Controller
{
    use UploadFile;

    public $dataTable;
    public $model;
    
    public function __construct($dataTable,$model){

        $this->dataTable = $dataTable;
        $this->model = $model;
    }
    public function getModel(){
        return class_basename($this->model);
    }
 

    public function index()
    {
        try {
            if (request()->ajax())
                return $this->dataTable->render('backend.includes.tables.rows');

            return view('backend.includes.pages.index-page', ['count' => $this->model::count(), 'no_ajax' => '']);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
   
    public function append(){
        return [];
    }
    public function create()
    {
        try {
            return view('backend.includes.pages.form-page',$this->append());
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function edit($id)
    {
        try {
            $row = $this->model::findOrFail($id);
            return view('backend.includes.pages.form-page',$this->append(),compact('row'));
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $row = $this->model::findOrFail($id);
            $row->delete();
            return response()->json(['message' => 'Your ' .$this->getModel().' has been deleted!', 'icon' => 'success', 'count' => $this->model::count()]);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

    }
        public function multidelete(Request $request)
        {
            try {
                $ids = $this->model::whereIn('id', (array)$request['id'])->get();
                DB::beginTransaction();
                foreach ($ids as $id) {
                    $id->delete();
                }
                DB::commit();
                return response()->json(['message' => 'Your '. $this->getModel() .'has been deleted! (' . count($ids) . ')', 'icon' => 'success', 'count' => $this->model::count()]);
            } catch (Exception $e) {
                return response()->json($e->getMessage(), 500);
            }
        }
    }


