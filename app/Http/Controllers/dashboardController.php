<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin|');
    }
    public function index()
    {
            return view('dashboard.dashboard');

            return abort(403);
    }
}
