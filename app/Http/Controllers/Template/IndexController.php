<?php
namespace App\Http\Controllers\Template;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function index($param='index')
    {
    	if (View::exists('app.template.'.$param) != true) {

        	$param = 'index';
        }

        return view('app.template.'.$param);
    }
}
