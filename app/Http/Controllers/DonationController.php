<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DonationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Donation');
        $datas = Donation::all();
        if (!empty($datas)) {
            return view('admin.donations.index', compact('datas'));
        }
        return view('admin.donations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        // dd()
        // if ($request->ajax()) {
        if ($request->isMethod('POST')) {
            $request->validate([
                'title' => 'required',
                'temple_id' => 'required',
                'description' => 'required',
                'donation_url' => 'required',
                'thumbnail_imgs' => 'required|mimes:jpg,png,jpeg',
            ]);
            DB::beginTransaction();
            try {
                $isSpecialEventCreated = Donation::create([
                    'uuid' => Str::uuid(),
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'description' => $request->description,
                    'donation_url' => $request->donation_url,
                    'thumbnail_img' => getthumbnailImg($request->thumbnail_imgs),
                ]);
                // dd($isLiveStreamingCreated);
                if ($isSpecialEventCreated) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'Donation Link Created Successfully');
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
            'donation_url' => 'required',
            'thumbnail_imgs' => 'mimes:jpg,png,jpeg',
        ]);
        DB::beginTransaction();
        try {
            $id = uuidtoid($uuid, 'donations');
            if ($request->file('thumbnail_imgs')) {
                $isUpdated = Donation::where('id', $id)->update([
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'description' => $request->description,
                    'donation_url' => $request->donation_url,
                    'thumbnail_img' => getthumbnailImg($request->thumbnail_imgs),
                ]);
            } else {
                $isUpdated = Donation::where('id', $id)->update([
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'description' => $request->description,
                    'donation_url' => $request->donation_url,
                ]);
            }
            // dd($isUpdated);
            if ($isUpdated) {
                DB::commit();
                return $this->responseJson(true, 200, 'Donation Created Successfully');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            // logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
            return $this->responseJson(false, 500, 'Something Went Wrong');
        }
    }

}
