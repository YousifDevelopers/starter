<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SecoundController extends Controller
{
    public function __construct (){

        $this->middleware('auth')->except('getText3');

    }
    public function getText(){
        return 'Test is  done';
    }
    public function getText2(){
        return 'Test is  done 2';
    }
    public function getText3(){
        return 'Test is  done 3';
    }
}
