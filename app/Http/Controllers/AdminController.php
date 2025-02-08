<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function index(){
        $merchents=User::where('role',2)->get();
        return view('admin.index',compact('merchents'));
     }
}
