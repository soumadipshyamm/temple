<?php

namespace App\Http\Controllers;

use App\Models\LiveStreaming;
use App\Models\Puja;
use App\Models\SpecialEvent;
use App\Models\Temple;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends BannerController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->setPageTitle('Dashboard');
        $temple = Temple::all();
        $count = count($temple);
        $puja = Puja::all();
        $liveStreaming = LiveStreaming::all();
        $specialEvent = SpecialEvent::all();
        // if (!empty($datas)) {
        return view('admin.dashboard.index', compact('temple', 'puja', 'liveStreaming', 'specialEvent'));
        // }
        // return view('admin.dashboard.index');
    }

//     old_password
// new_password
// confirm_password

    public function passwordUpdate(Request $request)
    {
        // if ($request->ajax()) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => ['same:new_password'],
        ]);
        // dd($request->all());
        DB::beginTransaction();
        try {
            if (Hash::check($request->old_password, auth()->user()->password)) {
                $addPolicyProvied = User::find(auth()->user()->id)->update([
                    'password' => Hash::make($request->new_password),
                ]);
                // dd($addPolicyProvied);
                DB::commit();
                return $this->responseJson(true, 200, "Your Password Updated Successfully");
            } else {
                return $this->responseRedirectBack('do not matched the password ', 'info', true, true);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseRedirectBack('We are facing some issue', 'info', true, true);
        }

    }

}
