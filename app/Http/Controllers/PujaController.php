<?php

namespace App\Http\Controllers;

use App\Models\Puja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PujaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Puja');
        $pujas = Puja::all();
        // $pujas->first()->temple;
        if (!empty($pujas)) {
            return view('admin.pujas.index', compact('pujas'));
        }
        return view('admin.pujas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => 'required',
                'temple_id' => 'required',
                // 'puja_start_date' => 'required',
                // 'puja_end_date' => 'required',
                'puja_start_date' => 'required|date_format:Y-m-d',
                'puja_end_date' => 'required|date_format:Y-m-d|after_or_equal:puja_start_date',
                'puja_start_time' => 'required|date_format:H:i:s',
                'puja_end_time' => 'required|date_format:H:i:s|after_or_equal:puja_start_time',
                'description' => 'required',
                'puja_img' => 'required|mimes:jpg,png,jpeg',
            ]);
            // dd($request->alafter_or_equal:todayl());
            DB::beginTransaction();
            try {
                $isPujaCreated = Puja::create([
                    'uuid' => Str::uuid(),
                    'name' => $request->name,
                    'temple_id' => $request->temple_id,
                    'puja_start_date' => $request->puja_start_date,
                    'puja_end_date' => $request->puja_end_date,
                    'puja_start_time' => $request->puja_start_time,
                    'puja_end_time' => $request->puja_end_time,
                    'description' => $request->description,
                    'thumbnals' => getthumbnailImg($request->puja_img, 'puja_img'),
                ]);
                // dd($isPujaCreated);
                if ($isPujaCreated) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'Puja Created Successfully');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseJson(false, 500, 'Something Went Wrong');
            }
        } else {
            abort(405);
        }
    }

    public function edit(Request $request, $uuid)
    {
        $request->validate([
            'name' => 'required',
            'temple_id' => 'required',
            'puja_start_date' => 'required|date_format:Y-m-d',
            'puja_end_date' => 'required|date_format:Y-m-d|after_or_equal:puja_start_date',
            'puja_start_time' => 'required|date_format:H:i:s',
            'puja_end_time' => 'required|date_format:H:i:s|after_or_equal:puja_start_time',
            'description' => 'required',
            'puja_img' => 'mimes:jpg,png,jpeg',
        ]);
        // dd($request->all());
        DB::beginTransaction();
        try {
            $id = uuidtoid($uuid, 'pujas');
            if ($request->file('puja_img')) {
                $isUpdated = Puja::where('id', $id)->update([
                    'name' => $request->name,
                    'temple_id' => $request->temple_id,
                    'puja_start_date' => $request->puja_start_date,
                    'puja_end_date' => $request->puja_end_date,
                    'puja_start_time' => $request->puja_start_time,
                    'puja_end_time' => $request->puja_end_time,
                    'description' => $request->description,
                    'thumbnals' => getthumbnailImg($request->file('puja_img')),
                ]);
            } else {
                $isUpdated = Puja::where('id', $id)->update([
                    'name' => $request->name,
                    'temple_id' => $request->temple_id,
                    'puja_start_date' => $request->puja_start_date,
                    'puja_end_date' => $request->puja_end_date,
                    'puja_start_time' => $request->puja_start_time,
                    'puja_end_time' => $request->puja_end_time,
                    'description' => $request->description,
                ]);
            }
            // dd($isUpdated);
            if ($isUpdated) {
                DB::commit();
                return $this->responseJson(true, 200, 'Puja Created Successfully');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            // logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
            return $this->responseJson(false, 500, 'Something Went Wrong');
        }
    }
}
