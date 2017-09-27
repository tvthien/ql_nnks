<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function change_content($url)
    {
    	switch ($url) {
    		case 'index':
    			return view('index.layout');
    			break;
    		
    		default:
    			return view('index.layout');
    			break;
    	}
    }
}
