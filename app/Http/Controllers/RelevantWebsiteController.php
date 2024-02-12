<?php

namespace App\Http\Controllers;

use App\Models\RelevantWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RelevantWebsiteController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->setPageTitle('Relevants Website');
        $datas = RelevantWebsite::all();
        if (!empty($datas)) {
            return view('admin.relevant-website.index', compact('datas'));
        }
        return view('admin.relevant-website.index');
    }

    public function add(Request $request)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $request->validate([
                'title' => 'required',
                'temple_id' => 'required',
                'url' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $isRelevantWebsiteCreated = RelevantWebsite::create([
                    'uuid' => Str::uuid(),
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'url' => $request->url,
                ]);
                // dd($isLiveStreamingCreated);
                if ($isRelevantWebsiteCreated) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'Relevants Website Created Successfully');
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
                'url' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $id = uuidtoid($uuid, 'relevant_websites');
                $isUpdated = RelevantWebsite::where('id', $id)->update([
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'temple_id' => $request->temple_id,
                    'url' => $request->url,
                ]);
                // dd($isUpdated);
                if ($isUpdated) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'Relevants Website Created Successfully');
                }
            } catch (\Exception $e) {
                DB::rollBack();
                return $this->responseJson(false, 500, 'Something Went Wrong');
            }
        } else {
            abort(405);
        }
    }
}
