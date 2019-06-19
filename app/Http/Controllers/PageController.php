<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function viewPages()
    {
    	return view('Pages.index',['page'=>Page::all()]);
    }

    public function createPage()
    {
    	
    }

    public function updatePage()
    {
    	
    }
}
