<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use RealRashid\SweetAlert\Facades\Alert;

class BackupController extends Controller
{
    public function index(){
        Artisan::call('backup:run');
        Alert::success('message','done!');
        return back();
    }

}
