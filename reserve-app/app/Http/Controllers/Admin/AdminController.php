<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//admin er under e controller important

class AdminController extends Controller
{
    public function index(){
      return view('admin.index');
    }
}
