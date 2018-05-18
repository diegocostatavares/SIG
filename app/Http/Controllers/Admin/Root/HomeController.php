<?php

namespace App\Http\Controllers\Admin\Root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index(){

        return 'modulo root';
    }
}
