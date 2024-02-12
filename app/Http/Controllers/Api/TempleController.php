<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\AlliedServicesResources;
use App\Http\Resources\BannerResources;
use App\Http\Resources\CityResource;
use App\Http\Resources\DarshanTimeResources;
use App\Http\Resources\DonationResources;
use App\Http\Resources\FestivalResource;
use App\Http\Resources\LiveStrimengResources;
use App\Http\Resources\NewsResources;
use App\Http\Resources\PujaResources;
use App\Http\Resources\RelevantWebsiteResources;
use App\Http\Resources\SliderResources;
use App\Http\Resources\socialServicesResources;
use App\Http\Resources\SpecialEventRecources;
use App\Http\Resources\TempleResources;
use App\Http\Resources\UpcommingPujaResources;
use App\Models\AlliedServices;
use App\Models\Banner;
use App\Models\DarshanTime;
use App\Models\Donation;
use App\Models\Festivals;
use App\Models\images;
use App\Models\LiveStreaming;
use App\Models\News;
use App\Models\Puja;
use App\Models\RelevantWebsite;
use App\Models\SocialServices;
use App\Models\SpecialEvent;
use App\Models\Temple;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TempleController extends BaseController
{

    public function temple()
    {
        $temples = Temple::all();
        return $this->responseJson(true, 200, 'Temple Found successfully', TempleResources::collection($temples));
    }
    public function darshan()
    {
        $darshan = DarshanTime::all();
        return $this->responseJson(true, 200, 'Darshan Time Found successfully', DarshanTimeResources::collection($darshan));
    }
    public function slider()
    {
        $slider_img = images::all();
        // dd($temples->toArray());
        return $this->responseJson(true, 200, 'Slider Images Found successfully', SliderResources::collection($slider_img));
    }
    public function banner()
    {
        $banner = Banner::all();
        return $this->responseJson(true, 200, 'Banner Images Found successfully', BannerResources::collection($banner));
    }

    public function puja()
    {
        $currentDate = Carbon::now()->toDateString();
        $puja = Puja::all();
        return $this->responseJson(true, 200, 'Puja  Found successfully', PujaResources::collection($puja));
    }

    public function explorePuja()
    {
        $temples = Temple::where('explore', '1')->get();
        return $this->responseJson(true, 200, 'Explore Puja Found successfully', TempleResources::collection($temples));
        // return $temples;
    }
    public function liveStrimming()
    {
        $currentDate = Carbon::now()->toDateString();
        $temples = LiveStreaming::where('start_date', '=', $currentDate)->get();
        if (count($temples) != 0 && $temples != null) {
            return $this->responseJson(true, 200, 'Live Stremming Found successfully', LiveStrimengResources::collection($temples));
        } else {
            return $this->responseJson(true, 200, ' No Found Live Videos ', []);
        }
    }
    public function upcommingPuja()
    {
        $currentDate = Carbon::now()->toDateString();
        $upcommingPuja = LiveStreaming::where('start_date', '>', $currentDate)->get();
        // $upcommingPuja = Puja::with('livestreaming')->where('puja_start_date', '>=', $currentDate)->get();
        // return $upcommingPuja;
        if (count($upcommingPuja) != 0 && $upcommingPuja != null) {
            return $this->responseJson(true, 200, 'Up-Comming Puja Found successfully', UpcommingPujaResources::collection($upcommingPuja));
        } else {
            return $this->responseJson(true, 200, ' No Found Up-Comming Puja ', []);
        }
    }


    public function specialEvent()
    {
        $currentDate = Carbon::now()->toDateString();
        $specialEvent = SpecialEvent::where('start_date', '>=', $currentDate)->orWhere('end_date', '<=', $currentDate)->get();
        // return $specialEvent;
        if (count($specialEvent) != 0 && $specialEvent != null) {
            return $this->responseJson(true, 200, 'Searching Special Event Found successfully', SpecialEventRecources::collection($specialEvent));
        } else {
            return $this->responseJson(true, 200, ' No Found Special Event ', []);
        }
    }

    public function searchCity()
    {
        $cityNames = Temple::with('city')->get();
        if (count($cityNames) != 0 && $cityNames != null) {
            return $this->responseJson(true, 200, 'Cities Found successfully', CityResource::collection($cityNames));
        } else {
            return $this->responseJson(true, 200, ' No Found Cities ', []);
        }
    }

    public function searchingTemple(Request $request)
    {
        $specialEvent = Temple::whereRaw("MATCH(`name`) AGAINST(? IN NATURAL LANGUAGE MODE)", [$request->temple_name])->get();
        // return $specialEvent;
        if (count($specialEvent) != 0 && $specialEvent != null) {
            return $this->responseJson(true, 200, 'Searching Temple Found successfully', TempleResources::collection($specialEvent));
        } else {
            return $this->responseJson(true, 200, 'Searching Temple Not Found', []);
        }
    }
    public function searchingTempleLocation(Request $request)
    {
        // dd($request->all());
        $type = $request->type;
        switch ($type) {
            case 'nearbyme':
                $latitude = $request->latitude;
                $longitude = $request->longitude;
                $radius = 13; // Radius in kilometers
                $data = Temple::selectRaw("*,
                            (6371 * acos(cos(radians($latitude)) * cos(radians(lat)) * cos(radians(`long`) - radians($longitude)) + sin(radians($latitude)) * sin(radians(lat)))) AS distance ")

                    ->having('distance', '<=', $radius)
                    ->orderBy('distance')
                    ->get();
                $message = 'searching near by me ';
                break;
            case 'area':
                $cityName = $request->city;
                $stateName = $request->state;
                $countryName = $request->country;

                $data = Temple::whereHas('city.state.country', function ($query) use ($countryName) {
                    $query->where('name', 'like', '%' . $countryName . '%');
                })
                    ->whereHas('city.state', function ($query) use ($stateName) {
                        $query->where('name', 'like', '%' . $stateName . '%');
                    })
                    ->whereHas('city', function ($query) use ($cityName) {
                        $query->where('name', 'like', '%' . $cityName . '%');
                    })
                    ->get();
                $message = ' Searching Area of city';
                break;
        }
        if (isset($data)) {
            return $this->responseJson(true, 200, $message, TempleResources::collection($data));
        } else {
            return $this->responseJson(false, 500, 'Something Wrong Happened', []);
        }
    }

    public function socialServices(Request $request)
    {
        $id = $request->temple_id;
        $SocialServices = SocialServices::where('temple_id', $id)->get();
        if (isset($SocialServices)) {
            return $this->responseJson(true, 200, 'Social Services Found successfully', socialServicesResources::collection($SocialServices));
        } else {
            return $this->responseJson(false, 500, 'Something Wrong Happened', []);
        }
    }
    public function relevantWebsite(Request $request)
    {
        $id = $request->temple_id;
        $relevantWebsite = RelevantWebsite::where('temple_id', $id)->get();
        if (isset($relevantWebsite)) {
            // return $relevantWebsite;
            return $this->responseJson(true, 200, 'Relevant Website Found successfully', RelevantWebsiteResources::collection($relevantWebsite));
        } else {
            return $this->responseJson(false, 500, 'Something Wrong Happened', []);
        }
    }
    public function donation(Request $request)
    {
        $id = $request->temple_id;
        $donation = Donation::where('temple_id', $id)->get();
        if (isset($donation)) {
            // return $donation;
            return $this->responseJson(true, 200, 'Donation Found successfully', DonationResources::collection($donation));
        } else {
            return $this->responseJson(false, 500, 'Something Wrong Happened', []);
        }
    }
    public function news(Request $request)
    {
        $id = $request->temple_id;
        $news = News::where('temple_id', $id)->get();
        if (isset($news)) {
            // return $news;
            return $this->responseJson(true, 200, 'News Found successfully', NewsResources::collection($news));
        } else {
            return $this->responseJson(false, 500, 'Something Wrong Happened', []);
        }
    }
    public function alliedServices(Request $request)
    {
        $id = $request->temple_id;
        $alliedServices = AlliedServices::where('temple_id', $id)->get();
        if (isset($alliedServices)) {
            // return $alliedServices;
            return $this->responseJson(true, 200, 'Allied Services Found successfully', AlliedServicesResources::collection($alliedServices));
        } else {
            return $this->responseJson(false, 500, 'Something Wrong Happened', []);
        }
    }
    public function festival(Request $request)
    {
        $festival = Festivals::all();
        if (isset($festival)) {
            // return $festival;
            return $this->responseJson(true, 200, 'Festival Found successfully', FestivalResource::collection($festival));
        } else {
            return $this->responseJson(false, 500, 'Something Wrong Happened', []);
        }
    }

}
