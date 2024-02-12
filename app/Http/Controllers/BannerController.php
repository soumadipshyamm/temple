<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BannerController extends BaseController
{

    public function index()
    {
        $this->setPageTitle('Banner');
        $datas = Banner::with('temple')->get();
        if (!empty($datas)) {
            return view('admin.banner.index', compact('datas'));
        }
        return view('admin.banner.index');
    }
    public function add(Request $request)
    {
        // dd($request->all());
        if ($request->isMethod('POST')) {
            $request->validate([
                'temple_id' => 'required',
                'banner_img' => 'required|mimes:jpg,png,jpeg',
            ]);
            DB::beginTransaction();
            try {
                $isBannerCreated = Banner::create([
                    'uuid' => Str::uuid(),
                    'user_id' => auth()->user()->id,
                    'temple_id' => $request->temple_id,
                    'banner_image' => getImgUpload($request->banner_img, 'banner_image'),
                ]);

                // $templeImgUpload = images::insert($temple_img);
                // dd($isBannerCreated);
                if ($isBannerCreated) {
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
        // dd($request->all());
    }
}
