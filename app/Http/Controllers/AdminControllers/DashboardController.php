<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $page_section_title = "Home";
        $main_section_title = "Home";
        return view('admin_dashboard.index', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
        ]);
    }
}
