<?php

namespace App\Http\Controllers\Clerk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LegderController extends Controller
{
    public function create(){
        return view('clerk.ledger-account');
    }
}
