<?php

namespace App\Http\Controllers;

use App\Models\DarshanTime;
use App\Models\images;
use App\Models\Temple;
use auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TempleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Temple');
        $temples = Temple::with('darshanTime', 'sliderImg')->get();
        // dd($temples);
        if (!empty($temples)) {
            return view('admin.temple.index', compact('temples'));
        }
        return view('admin.temple.index');
    }
    public function viewDetails($uuid)
    {
        $templeId = uuidtoid($uuid, 'temples');
        $temples = Temple::where('id', $templeId)->get();
        // dd($temples);
        return view('admin.temple.viewDetails', compact('temples'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        // dd($request->all());

        if ($request->ajax()) {

            $request->validate([
                'name' => 'required',
                // 'title' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                'city_id' => 'required',
                'email' => 'email',
                'postal_code' => 'required|digits_between:0,5',
                'phone_number' => 'required|digits_between:0,9',
                'address' => 'required',
                'lat' => 'required',
                'long' => 'required',
                'rules' => 'required',
                'history' => 'required',
                'description' => 'required',
                'consecrated_deity' => 'required',
                'temple_existence' => 'required',
                'special_poojas_sevas' => 'required',
                'accommodation' => 'required',
                'temple_transport' => 'required',
                'temple_authority' => 'required',
                'books_magazines' => 'required',
                'temple_donations' => 'required',
                'booking' => 'url',
                'thumbnail_imgs' => 'required|mimes:jpg,png,jpeg',
            ]);
            DB::beginTransaction();
            try {
                $isClientCreated = Temple::create([
                    'uuid' => Str::uuid(),
                    'name' => $request->name,
                    // 'title' => $request->title,
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'city_id' => $request->city_id,
                    'email' => $request->email,
                    'postal_code' => $request->postal_code,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                    'lat' => $request->lat,
                    'long' => $request->long,
                    'rules' => $request->rules,
                    'history' => $request->history,
                    'description' => $request->description,
                    'consecrated_deity' => $request->consecrated_deity,
                    'temple_existence' => $request->temple_existence,
                    'special_poojas_sevas' => $request->special_poojas_sevas,
                    'accommodation' => $request->accommodation,
                    'temple_transport' => $request->temple_transport,
                    'temple_authority' => $request->temple_authority,
                    'books_magazines' => $request->books_magazines,
                    'temple_donations' => $request->temple_donations,
                    'publication' => $request->publication,
                    'tradition' => $request->tradition,
                    'booking' => $request->booking,
                    'img' => getthumbnailImg($request->thumbnail_imgs),
                ]);

                if ($isClientCreated) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'Temple Created Successfully');
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Temple  $temple
     * @return \Illuminate\Http\Response
     */
    public function sliderImg($uuid)
    {
        $id = uuidtoid($uuid, 'temples');
        $data = images::where('page_id', $id)->where('page_name', 'temple')->get();
        // dd($data->toArray());
        if ($data != null) {
            return view('admin.temple.sliderimg', compact('data'));
        }
        return view('admin.temple.sliderimg');
    }

    public function addSliderImg(Request $request)
    {
        if ($request->ajax()) {
            $pageId = $id = uuidtoid($request->uuid, 'temples');
            DB::beginTransaction();
            try {
                $temple_img = getSliderImg($request->temple_img, 'temple', $pageId);
                $templeImgUpload = images::insert($temple_img);
                // dd($temple_img);
                if ($temple_img) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'Temple Created Successfully');
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Temple  $temple
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $uuid)
    {
        $request->validate([
            'name' => 'required',
            // 'title' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'email' => 'email',
            'postal_code' => 'required|digits_between:0,6',
            'phone_number' => 'required|digits_between:0,10',
            'address' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'rules' => 'required',
            'history' => 'required',
            'description' => 'required',
            'consecrated_deity' => 'required',
            'temple_existence' => 'required',
            'special_poojas_sevas' => 'required',
            'accommodation' => 'required',
            'temple_transport' => 'required',
            'temple_authority' => 'required',
            'books_magazines' => 'required',
            'temple_donations' => 'required',
            'booking' => 'url',
            'thumbnail_imgs' => 'mimes:jpg,png,jpeg',
        ]);
        DB::beginTransaction();
        try {
            $id = uuidtoid($uuid, 'temples');
            if ($request->file('thumbnail_imgs')) {
                $isClientCreated = Temple::where('id', $id)->update([
                    'name' => $request->name,
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'city_id' => $request->city_id,
                    'email' => $request->email,
                    'postal_code' => $request->postal_code,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                    'lat' => $request->lat,
                    'long' => $request->long,
                    'rules' => $request->rules,
                    'history' => $request->history,
                    'description' => $request->description,
                    'consecrated_deity' => $request->consecrated_deity,
                    'temple_existence' => $request->temple_existence,
                    'special_poojas_sevas' => $request->special_poojas_sevas,
                    'accommodation' => $request->accommodation,
                    'temple_transport' => $request->temple_transport,
                    'temple_authority' => $request->temple_authority,
                    'books_magazines' => $request->books_magazines,
                    'temple_donations' => $request->temple_donations,
                    'publication' => $request->publication,
                    'tradition' => $request->tradition,
                    'booking' => $request->booking,
                    'img' => getthumbnailImg($request->file('thumbnail_imgs')),
                ]);
            } else {
                $isClientCreated = Temple::where('id', $id)->update([
                    'name' => $request->name,
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'city_id' => $request->city_id,
                    'email' => $request->email,
                    'postal_code' => $request->postal_code,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                    'lat' => $request->lat,
                    'long' => $request->long,
                    'rules' => $request->rules,
                    'history' => $request->history,
                    'description' => $request->description,
                    'consecrated_deity' => $request->consecrated_deity,
                    'temple_existence' => $request->temple_existence,
                    'special_poojas_sevas' => $request->special_poojas_sevas,
                    'accommodation' => $request->accommodation,
                    'temple_transport' => $request->temple_transport,
                    'temple_authority' => $request->temple_authority,
                    'books_magazines' => $request->books_magazines,
                    'temple_donations' => $request->temple_donations,
                    'publication' => $request->publication,
                    'tradition' => $request->tradition,
                    'booking' => $request->booking,
                ]);
            }
            // dd($isClientCreated);
            if ($isClientCreated) {
                DB::commit();
                return $this->responseJson(true, 200, 'Temple Created Successfully');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
            return $this->responseJson(false, 500, 'Something Went Wrong');
        }
    }

// **************************************************************************************

    public function darshanTime($uuid)
    {
        $id = uuidtoid($uuid, 'temples');
        $data = DarshanTime::where('temple_id', $id)->get();
        // dd($data->toArray());
        if ($data != null) {
            return view('admin.temple.darshan-time', compact('data'));
        }
        return view('admin.temple.darshan-time');
    }

    public function addDarshanTime(Request $request)
    {
        DB::beginTransaction();
        try {
            $templeId = uuidtoid($request->uuid, 'temples');
            foreach ($request->start_time as $key => $value) {
                $darsan = new DarshanTime();
                $darsan->uuid = Str::uuid();
                $darsan->user_id = auth()->user()->id;
                $darsan->temple_id = $templeId;
                $darsan->start_time = $value;
                $darsan->end_time = $request->end_time[$key];
                $darsan->title = $request->title[$key];
                $darsan->description = $request->description[$key];
                $darsan->save();
            }
            if ($darsan) {
                DB::commit();
                return $this->responseJson(true, 200, 'Darshan Time Created Successfully');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
            return $this->responseJson(false, 500, 'Something Went Wrong');
        }
    }
}
