<?php

namespace App\Http\Controllers;

use App\Models\AlliedServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlliedServicesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Allied Services');
        $datas = AlliedServices::all();
        if (!empty($datas)) {
            return view('admin.allied-services.index', compact('datas'));
        }
        return view('admin.allied-services.index');
    }

    public function add(Request $request)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $request->validate([
                'title' => 'required',
                'temple_id' => 'required',
                'description' => 'required',
                'thumbnail_imgs' => 'required|mimes:jpg,png,jpeg',
            ]);
            DB::beginTransaction();
            try {
                $isSpecialEventCreated = AlliedServices::create([
                    'uuid' => Str::uuid(),
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'description' => $request->description,
                    'url' => $request->url,
                    'thumbnail_img' => getthumbnailImg($request->thumbnail_imgs),
                ]);
                // dd($isLiveStreamingCreated);
                if ($isSpecialEventCreated) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'Allied Services Created Successfully');
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
            'thumbnail_imgs' => 'mimes:jpg,png,jpeg',
        ]);
        DB::beginTransaction();
        try {
            $id = uuidtoid($uuid, 'allied_services');
            if ($request->file('thumbnail_imgs')) {
                $isUpdated = AlliedServices::where('id', $id)->update([
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'description' => $request->description,
                    'url' => $request->url,
                    'thumbnail_img' => getthumbnailImg($request->thumbnail_imgs),
                ]);
            } else {
                $isUpdated = AlliedServices::where('id', $id)->update([
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'description' => $request->description,
                    'url' => $request->url,
                ]);
            }
            // dd($isUpdated);
            if ($isUpdated) {
                DB::commit();
                return $this->responseJson(true, 200, 'Allied Services Created Successfully');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseJson(false, 500, 'Something Went Wrong');
        }
    }

}
