<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PluginsController extends Controller
{
    public function marketplace(){
        return view('plugin.marketplace',['section' => 'application-manager']);
    }

    public function installed(){
        return view('plugin.installed',['section' => 'application-manager']);
    }
}
