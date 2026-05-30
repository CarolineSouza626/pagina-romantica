<?php

namespace App\Http\Controllers;

use App\Services\SiteContentService;

class HomeController extends Controller
{
    public function index(SiteContentService $content)
    {
        return view('home.index', $content->homePageData());
    }
}
