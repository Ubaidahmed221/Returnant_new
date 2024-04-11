<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AdminDashboardController extends Controller
{
    function index(): View{
        return view('admin.dashboard.index');
    }
}
