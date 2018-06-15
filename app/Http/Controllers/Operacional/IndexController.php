<?php
namespace App\Http\Controllers\Operacional;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('app.operacional.index');
    }
}
