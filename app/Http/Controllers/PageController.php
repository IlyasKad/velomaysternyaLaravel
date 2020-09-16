<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller {
    public function index() {
        return view('home');
    }

    public function getPage($code, $lang = 'ua') {
        $page = Page::where('code', $code)->first();
        $page->setLanguage($lang);
        return $page->render();
    }

    public function getAllPages($lang = 'ua') {
        $pages = Page::all();
        $tiles = [];
        foreach ($pages as $page) { 
            $page->setLanguage($lang); 
            array_push($tiles, $page->renderTile());
        }
        return view('allPages', ['tiles' => $tiles]);
    }
}
