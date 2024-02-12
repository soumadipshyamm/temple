<?php

namespace App\Http\Controllers;

use App\Models\Festivals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FestivalsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Festivals');
        $datas = Festivals::all();
        if (!empty($datas)) {
            return view('admin.festivals.index', compact('datas'));
        }
        return view('admin.festivals.index');
    }

    public function add(Request $request)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $request->validate([
                'title' => 'required',
                'temple_id' => 'required',
                'description' => 'required',
                // 'start_date' => 'required',
                // 'end_date' => 'required',
                'start_date' => 'required|date_format:Y-m-d',
                'end_date' => 'required|date_format:Y-m-d|after:start_date',
                'thumbnail_imgs' => 'required|mimes:jpg,png,jpeg',
            ]);
            DB::beginTransaction();
            try {
                $isSpecialEventCreated = Festivals::create([
                    'uuid' => Str::uuid(),
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'description' => $request->description,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'url' => $request->url,
                    'thumbnail_img' => getthumbnailImg($request->thumbnail_imgs),
                ]);
                // dd($isLiveStreamingCreated);
                if ($isSpecialEventCreated) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'Festivals Created Successfully');
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
            'title' => 'required',
            'temple_id' => 'required',
            'description' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d|after:start_date',
            'thumbnail_imgs' => 'mimes:jpg,png,jpeg',
        ]);
        DB::beginTransaction();
        try {
            $id = uuidtoid($uuid, 'festivals');
            if ($request->file('thumbnail_imgs')) {
                $isUpdated = Festivals::where('id', $id)->update([
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'description' => $request->description,
                    'url' => $request->url,
                    'thumbnail_img' => getthumbnailImg($request->thumbnail_imgs),
                ]);
            } else {
                $isUpdated = Festivals::where('id', $id)->update([
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'description' => $request->description,
                    'url' => $request->url,
                ]);
            }
            // dd($isUpdated);
            if ($isUpdated) {
                DB::commit();
                return $this->responseJson(true, 200, 'Festivals Created Successfully');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseJson(false, 500, 'Something Went Wrong');
        }
    }
}
