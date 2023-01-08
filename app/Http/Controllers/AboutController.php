<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $page_section_title = "Sobre Nós";
        $main_section_title = "Sobre Nós";
        $current_route = Route::currentRouteName();
        return view('about', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'current_route' => $current_route,
        ]);
    }
}
