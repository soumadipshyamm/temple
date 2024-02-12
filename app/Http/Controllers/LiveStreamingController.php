<?php

namespace App\Http\Controllers;

use App\Models\LiveStreaming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LiveStreamingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Live Streaming');
        $datas = LiveStreaming::all();
        // dd($datas->toArray());
        if (!empty($datas)) {
            return view('admin.live-strimeng.index', compact('datas'));
        }
        return view('admin.live-strimeng.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'title' => 'required',
                'temple_id' => 'required',
                'puja_id' => 'required',
                'live_url' => 'required',
                'start_date' => 'required|date_format:Y-m-d',
                'start_time' => 'required',
                'thumbnail_imgs' => 'required|mimes:jpg,png,jpeg',
            ]);
            // dd($request->all());

            DB::beginTransaction();
            try {
                $isLiveStreamingCreated = LiveStreaming::create([
                    'uuid' => Str::uuid(),
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'puja_id' => $request->puja_id,
                    'live_url' => $request->live_url,
                    'start_date' => $request->start_date,
                    'start_time' => $request->start_time,
                    'thumbnail_img' => getthumbnailImg($request->thumbnail_imgs),
                ]);
                // dd($isLiveStreamingCreated);
                if ($isLiveStreamingCreated) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'Puja Live Streaming Created Successfully');
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
            'puja_id' => 'required',
            'live_url' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'start_time' => 'required',
            'thumbnail_imgs' => 'mimes:jpg,png,jpeg',
        ]);
        // dd($request->all());
        DB::beginTransaction();
        try {
            $id = uuidtoid($uuid, 'live_streamings');
            if ($request->file('thumbnail_imgs')) {
                $isUpdated = LiveStreaming::where('id', $id)->update([
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'puja_id' => $request->puja_id,
                    'live_url' => $request->live_url,
                    'start_date' => $request->start_date,
                    'start_time' => $request->start_time,
                    'thumbnail_img' => getthumbnailImg($request->file('thumbnail_imgs')),
                ]);
            } else {
                $isUpdated = LiveStreaming::where('id', $id)->update([
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'puja_id' => $request->puja_id,
                    'live_url' => $request->live_url,
                    'start_date' => $request->start_date,
                    'start_time' => $request->start_time,
                ]);
            }

            // dd($isLiveStreamingCreated);
            if ($isUpdated) {
                DB::commit();
                return $this->responseJson(true, 200, 'Puja Live Streaming Updated Successfully');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
            return $this->responseJson(false, 500, 'Something Went Wrong');
        }
    }

}
