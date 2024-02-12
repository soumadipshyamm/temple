<?php

namespace App\Http\Controllers;

use App\Models\Temple;

class ExploerController extends BaseController
{
    //
    public function index()
    {
        $this->setPageTitle('Explore');
        $datas=Temple::all();
        return view('admin.exploer.index',compact('datas'));
    }
}
