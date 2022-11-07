<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class AdminLogsController extends Controller
{
    public function logs(){
        $activity=Activity::join('users','users.id','=','activity_log.causer_id')
        ->select('users.name','users.role','activity_log.id','activity_log.description','activity_log.subject_type','activity_log.event','activity_log.subject_id','activity_log.causer_type','activity_log.causer_id','activity_log.created_at')
        ->orderBy('activity_log.created_at','desc')
        ->paginate(12);
        return view('admin.admin-logs',compact('activity'));
    }
}
