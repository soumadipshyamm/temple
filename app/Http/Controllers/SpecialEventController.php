<?php

namespace App\Http\Controllers;

use App\Models\SpecialEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpecialEventController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Special Event');
        $datas = SpecialEvent::all();
        if (!empty($datas)) {
            return view('admin.special-event.index', compact('datas'));
        }
        return view('admin.special-event.index');
    }
    public function add(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'name' => 'required',
                'temple_id' => 'required',
                'puja_id' => 'required',
                'description' => 'required',
                'start_date' => 'required|date_format:Y-m-d',
                'end_date' => 'required|date_format:Y-m-d|after:start_date',
                'start_time' => 'required',
                'end_time' => 'required|date_format:H:i:s|after_or_equal:start_time',
                'thumbnail_imgs' => 'required|mimes:jpg,png,jpeg',
            ]);
            DB::beginTransaction();
            try {
                $isSpecialEventCreated = SpecialEvent::create([
                    'uuid' => Str::uuid(),
                    'user_id' => auth()->user()->id,
                    'name' => $request->name,
                    'temple_id' => $request->temple_id,
                    'puja_id' => $request->puja_id,
                    'description' => $request->description,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'thumbnail_img' => getthumbnailImg($request->thumbnail_imgs),
                ]);
                // dd($isLiveStreamingCreated);
                if ($isSpecialEventCreated) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'Special Event Created Successfully');
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
        // dd($request->all());
        if ($request->ajax()) {
            $request->validate([
                'name' => 'required',
                'temple_id' => 'required',
                'puja_id' => 'required',
                'description' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'start_time' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $id = uuidtoid($uuid, 'special_events');
                if ($request->file('thumbnail_imgs')) {
                    $isSpecialEventCreated = SpecialEvent::where('id', $id)->update([
                        'user_id' => auth()->user()->id,
                        'name' => $request->name,
                        'temple_id' => $request->temple_id,
                        'puja_id' => $request->puja_id,
                        'description' => $request->description,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'start_time' => $request->start_time,
                        'end_time' => $request->end_time,
                        'thumbnail_img' => getthumbnailImg($request->thumbnail_imgs),
                    ]);
                } else {
                    $isSpecialEventCreated = SpecialEvent::where('id', $id)->update([
                        'user_id' => auth()->user()->id,
                        'name' => $request->name,
                        'temple_id' => $request->temple_id,
                        'puja_id' => $request->puja_id,
                        'description' => $request->description,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'start_time' => $request->start_time,
                        'end_time' => $request->end_time,
                    ]);
                }
                // dd($isLiveStreamingCreated);
                if ($isSpecialEventCreated) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'Special Event Update Successfully');
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

}
