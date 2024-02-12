<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Puja;
use App\Models\Citie;
use App\Models\State;
use App\Models\Banner;
use App\Models\images;
use App\Models\Temple;
use App\Models\Donation;
use App\Models\Festivals;
use App\Models\SpecialEvent;
use Illuminate\Http\Request;
use App\Models\LiveStreaming;
use App\Models\AlliedServices;
use App\Models\SocialServices;
use App\Models\RelevantWebsite;
use App\Http\Controllers\BaseController;
use App\Models\DarshanTime;

class AjaxController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getTemple(Request $request)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $id = uuidtoid($request->uuid, 'temples');
            // dd($id);
            $fetchIdExitOrNot = Temple::with('state','city')->where('id', $id)->first();
            // dd( $fetchIdExitOrNot);
            if ($fetchIdExitOrNot) {
                return $this->responseJson(true, 200, 'Temple found successfully', $fetchIdExitOrNot);
            }
            return $this->responseJson(false, 200, 'No data found');
        }
        abort(405);
    }

    public function getPuja(Request $request)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $id = uuidtoid($request->uuid, 'pujas');
            // dd($id);
            $fetchIdExitOrNot = Puja::where('id', $id)->first();
            if ($fetchIdExitOrNot) {
                return $this->responseJson(true, 200, 'Puja found Data successfully', $fetchIdExitOrNot);
            }
            return $this->responseJson(false, 200, 'No data found');
        }
        abort(405);
    }
    public function getBanner(Request $request)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $id = uuidtoid($request->uuid, 'banners');
            // dd($id);
            $fetchIdExitOrNot = Banner::where('id', $id)->first();
            if ($fetchIdExitOrNot) {
                return $this->responseJson(true, 200, 'Banner found Data successfully', $fetchIdExitOrNot);
            }
            return $this->responseJson(false, 200, 'No data found');
        }
        abort(405);
    }
    public function getLiveStrimeng(Request $request, $uuid)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $id = uuidtoid($uuid, 'live_streamings');
            // dd($id);
            $fetchIdExitOrNot = LiveStreaming::where('id', $id)->first();
            if ($fetchIdExitOrNot) {
                return $this->responseJson(true, 200, 'Live Strimeng Data found successfully', $fetchIdExitOrNot);
            }
            return $this->responseJson(false, 200, 'No data found');
        }
        abort(405);
    }
    public function getSpecialEvents(Request $request, $uuid)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $id = uuidtoid($uuid, 'special_events');
            $fetchIdExitOrNot = SpecialEvent::where('id', $id)->first();
            if ($fetchIdExitOrNot) {
                return $this->responseJson(true, 200, 'Special Events Data found successfully', $fetchIdExitOrNot);
            }
            return $this->responseJson(false, 200, 'No data found');
        }
        abort(405);
    }
    public function getSocialServices(Request $request, $uuid)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $id = uuidtoid($uuid, 'social_services');
            $fetchIdExitOrNot = SocialServices::where('id', $id)->first();
            if ($fetchIdExitOrNot) {
                return $this->responseJson(true, 200, 'Social Services Data found successfully', $fetchIdExitOrNot);
            }
            return $this->responseJson(false, 200, 'No data found');
        }
        abort(405);
    }
    public function getRelevantWebsite(Request $request, $uuid)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $id = uuidtoid($uuid, 'relevant_websites');
            $fetchIdExitOrNot = RelevantWebsite::where('id', $id)->first();
            if ($fetchIdExitOrNot) {
                return $this->responseJson(true, 200, 'Relevant Website Data found successfully', $fetchIdExitOrNot);
            }
            return $this->responseJson(false, 200, 'No data found');
        }
        abort(405);
    }
    public function getDonation(Request $request, $uuid)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $id = uuidtoid($uuid, 'donations');
            $fetchIdExitOrNot = Donation::where('id', $id)->first();
            if ($fetchIdExitOrNot) {
                return $this->responseJson(true, 200, 'Donation Data found successfully', $fetchIdExitOrNot);
            }
            return $this->responseJson(false, 200, 'No data found');
        }
        abort(405);
    }
    public function getAliedServices(Request $request, $uuid)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $id = uuidtoid($uuid, 'allied_services');
            $fetchIdExitOrNot = AlliedServices::where('id', $id)->first();
            if ($fetchIdExitOrNot) {
                return $this->responseJson(true, 200, 'Allied Services Data found successfully', $fetchIdExitOrNot);
            }
            return $this->responseJson(false, 200, 'No data found');
        }
        abort(405);
    }
    public function getNews(Request $request, $uuid)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $id = uuidtoid($uuid, 'news');
            $fetchIdExitOrNot = News::where('id', $id)->first();
            if ($fetchIdExitOrNot) {
                return $this->responseJson(true, 200, 'News Data found successfully', $fetchIdExitOrNot);
            }
            return $this->responseJson(false, 200, 'No data found');
        }
        abort(405);
    }
    public function getFestivals(Request $request, $uuid)
    {
        // dd($request->all());
        if ($request->ajax()) {
            $id = uuidtoid($uuid, 'festivals');
            $fetchIdExitOrNot = Festivals::where('id', $id)->first();
            if ($fetchIdExitOrNot) {
                return $this->responseJson(true, 200, 'Festivals found successfully', $fetchIdExitOrNot);
            }
            return $this->responseJson(false, 200, 'No data found');
        }
        abort(405);
    }

    // public function getVendor(Request $request)
    // {
    //     // dd($request->all());
    //     if ($request->ajax()) {
    //         $id = uuidtoid($request->uuid, 'Vendors');
    //         // dd($id);
    //         $fetchIdExitOrNot = Vendors::where('id', $id)->first();
    //         if ($fetchIdExitOrNot) {
    //             return $this->responseJson(true, 200, 'Vendor found successfully', $fetchIdExitOrNot);
    //         }
    //         return $this->responseJson(false, 200, 'No data found');
    //     }
    //     abort(405);
    // }

    // public function getVehicle(Request $request)
    // {
    //     // dd($request->all());
    //     if ($request->ajax()) {
    //         $id = uuidtoid($request->uuid, 'vehicles');
    //         // dd($id);
    //         $fetchIdExitOrNot = Vehicles::where('id', $id)->first();
    //         if ($fetchIdExitOrNot) {
    //             return $this->responseJson(true, 200, 'Vehicles found successfully', $fetchIdExitOrNot);
    //         }
    //         return $this->responseJson(false, 200, 'No data found');
    //     }
    //     abort(405);
    // }

    // public function getExpenses(Request $request)
    // {
    //     // dd($request->all());
    //     if ($request->ajax()) {
    //         $id = uuidtoid($request->uuid, 'expenses');
    //         // dd($id);
    //         $fetchIdExitOrNot = Expenses::where('id', $id)->first();
    //         if ($fetchIdExitOrNot) {
    //             return $this->responseJson(true, 200, 'Expenses found successfully', $fetchIdExitOrNot);
    //         }
    //         return $this->responseJson(false, 200, 'No data found');
    //     }
    //     abort(405);
    // }

    // public function getSupervisor(Request $request)
    // {
    //     // dd($request->all());
    //     if ($request->ajax()) {
    //         $id = uuidtoid($request->uuid, 'users');
    //         // dd($id);
    //         $fetchIdExitOrNot = User::where('id', $id)->first();
    //         if ($fetchIdExitOrNot) {
    //             return $this->responseJson(true, 200, 'Supervisor found successfully', $fetchIdExitOrNot);
    //         }
    //         return $this->responseJson(false, 200, 'No data found');
    //     }
    //     abort(405);
    // }

    // public function getClientAlloction(Request $request)
    // {
    //     // dd($request->all());
    //     if ($request->ajax()) {
    //         $id = uuidtoid($request->uuid, 'users');
    //         // dd($id);
    //         $fetchIdExitOrNot = User::with('clientsAlloction')->where('id', $id)->first();
    //         // dd($fetchIdExitOrNot->toArray());
    //         if ($fetchIdExitOrNot) {
    //             return $this->responseJson(true, 200, 'Supervisor found successfully', $fetchIdExitOrNot);
    //         }
    //         return $this->responseJson(false, 200, 'No data found');
    //     }
    //     abort(405);
    // }

    // public function getCarInOutTime(Request $request)
    // {
    //     // dd($request->all());
    //     if ($request->ajax()) {
    //         $id = uuidtoid($request->uuid, 'car_inout_times');
    //         // dd($id);
    //         $fetchIdExitOrNot = carInoutTime::where('id', $id)->first();
    //         if ($fetchIdExitOrNot) {
    //             return $this->responseJson(true, 200, 'Car Time found successfully', $fetchIdExitOrNot);
    //         }
    //         return $this->responseJson(false, 200, 'No data found');
    //     }
    //     abort(405);
    // }

    // public function getQrGenerateDetails(Request $request)
    // {
    //     // dd($request->all());
    //     if ($request->ajax()) {
    //         $id = uuidtoid($request->uuid, 'vehicles');
    //         // dd($id);
    //         $fetchIdExitOrNot = Vehicles::where('id', $id)->first();
    //         if ($fetchIdExitOrNot) {
    //             return $this->responseJson(true, 200, 'Vehical Details found successfully', $fetchIdExitOrNot);
    //         }
    //         return $this->responseJson(false, 200, 'No data found');
    //     }
    //     abort(405);
    // }
    public function setStatus(Request $request)
    {
        // dd($request->value);
        if ($request->ajax()) {
            $table = $request->find;
            $data = $request->value;
            //  $id = uuidtoid($request->uuid, $table);
            switch ($table) {
                case 'temples':
                    $id = uuidtoid($request->uuid, $table);
                    $data = Temple::where('id', $id)->update([
                        'explore' => $request->is_active,
                    ]);
                    //  $data = $this->userService->updateUser($request->only('is_active'), $id);
                    //    return $request->only('is_active');
                    $message = 'User Status updated';
                    break;

                default:
                    return $this->responseJson(false, 200, 'Something Wrong Happened');
            }

            if ($data) {
                return $this->responseJson(true, 200, $message);
            } else {
                return $this->responseJson(false, 200, 'Something Wrong Happened');
            }
        }
        abort(405);
    }

    public function deleteData(Request $request)
    {
        if ($request->ajax()) {
            $table = $request->find;
            switch ($table) {
                case 'images':
                    $id = uuidtoid($request->uuid, $table);
                    $data = images::where('id', $id)->delete();
                    $message = 'Image Deleted';
                    break;
                case 'banners':
                    $id = uuidtoid($request->uuid, $table);
                    $data = Banner::where('id', $id)->delete();
                    $message = 'Banner Image Deleted';
                    break;
                case 'temples':
                    $id = uuidtoid($request->uuid, $table);
                    $data = Temple::where('id', $id)->delete();
                    $message = 'Temple Data Deleted';
                    break;
                case 'pujas':
                    $id = uuidtoid($request->uuid, $table);
                    $data = Puja::where('id', $id)->delete();
                    $message = 'Puja Data Deleted';
                    break;
                case 'live_streamings':
                    $id = uuidtoid($request->uuid, $table);
                    $data = LiveStreaming::where('id', $id)->delete();
                    $message = 'Puja Data Deleted';
                    break;
                case 'special_events':
                    $id = uuidtoid($request->uuid, $table);
                    $data = SpecialEvent::where('id', $id)->delete();
                    $message = 'Special Event Data Deleted';
                    break;
                case 'social_services':
                    $id = uuidtoid($request->uuid, $table);
                    $data = SocialServices::where('id', $id)->delete();
                    $message = 'Social Services Data Deleted';
                    break;
                case 'darshan_times':
                    $id = uuidtoid($request->uuid, $table);
                    $data = DarshanTime::where('id', $id)->delete();
                    $message = 'Darshan Times Data Deleted';
                    break;
                case 'relevant_websites':
                    $id = uuidtoid($request->uuid, $table);
                    $data = RelevantWebsite::where('id', $id)->delete();
                    $message = 'Relevants Website Data Deleted';
                    break;
                case 'donations':
                    $id = uuidtoid($request->uuid, $table);
                    $data = Donation::where('id', $id)->delete();
                    $message = 'Donations Data Deleted';
                    break;
                case 'news':
                    $id = uuidtoid($request->uuid, $table);
                    $data = News::where('id', $id)->delete();
                    $message = 'News  Data Deleted';
                    break;
                case 'allied_services':
                    $id = uuidtoid($request->uuid, $table);
                    $data = AlliedServices::where('id', $id)->delete();
                    $message = 'Allied Services  Data Deleted';
                    break;
                case 'festivals':
                    $id = uuidtoid($request->uuid, $table);
                    $data = Festivals::where('id', $id)->delete();
                    $message = 'Festivals  Data Deleted';
                    break;
            }
            if (isset($data)) {
                return $this->responseJson(true, 200, $message);
            } else {
                return $this->responseJson(false, 500, 'Something Wrong Happened');
            }
        } else {
            abort(405);
        }
    }

    public function fetchState(Request $request)
    {

        $data['states'] = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);

        // return response()->json($data);
        return $this->responseJson(true, 200, 'Client found successfully', $data);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchCity(Request $request)
    {
        $data['cities'] = Citie::where("state_id", $request->state_id)
            ->get(["name", "id"]);

        // return response()->json($data);
        return $this->responseJson(true, 200, 'Client found successfully', $data);
    }
}
