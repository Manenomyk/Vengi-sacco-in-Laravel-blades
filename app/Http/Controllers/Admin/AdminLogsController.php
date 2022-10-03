<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class AdminLogsController extends Controller
{
    public function logs(){
        $activity=Activity::join('users','users.id','=','activity_log.causer_id')->get();
        return view('admin.admin-logs',compact('activity'));
    }
}
