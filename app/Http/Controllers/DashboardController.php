<?php

namespace App\Http\Controllers;
use App\Models\Guest;
use App\Models\User;
use App\Models\Companion;
use App\Models\Visa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {

        return view('dashboard.index');
    }






}
