<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AdminAuthController extends Controller
{
    public function index() : View {
        return view('admin.auth.login');
    }
}
