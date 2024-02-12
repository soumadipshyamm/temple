<?php

namespace App\Http\Controllers;

use App\Models\SocialServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SocialServicesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Social Services');
        $datas = SocialServices::all();
        if (!empty($datas)) {
            return view('admin.social-services.index', compact('datas'));
        }
        return view('admin.social-services.index');
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
                $isSpecialEventCreated = SocialServices::create([
                    'uuid' => Str::uuid(),
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'description' => $request->description,
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
        if ($request->ajax()) {
            $request->validate([
                'title' => 'required',
                'temple_id' => 'required',
                'description' => 'required',
                'thumbnail_imgs' => 'mimes:jpg,png,jpeg',
            ]);
            DB::beginTransaction();
            try {
                $id = uuidtoid($uuid, 'social_services');
                if ($request->file('thumbnail_imgs')) {
                    $isUpdated = SocialServices::where('id', $id)->update([
                        'user_id' => auth()->user()->id,
                        'title' => $request->title,
                        'temple_id' => $request->temple_id,
                        'description' => $request->description,
                        'thumbnail_img' => getthumbnailImg($request->thumbnail_imgs),
                    ]);
                } else {
                    $isUpdated = SocialServices::where('id', $id)->update([
                        'user_id' => auth()->user()->id,
                        'title' => $request->title,
                        'temple_id' => $request->temple_id,
                        'description' => $request->description,
                    ]);
                }
                // dd($isUpdated);
                if ($isUpdated) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'Social Services Updated Successfully');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                // logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseJson(false, 500, 'Something Went Wrong');
            }
        } else {
            abort(405);
        }
    }

}

// $todayDate = Carbon::now()->format('H:i:m');
// $todayDate = Carbon::now()->format('Y-m-d');
