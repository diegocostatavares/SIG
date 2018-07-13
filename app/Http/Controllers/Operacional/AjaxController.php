<?php
namespace App\Http\Controllers\Operacional;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Log;

class AjaxController extends Controller
{

    public function index(Request $request)
    {
        $data = $request->all();
        dd($data);
    }

    public function testeee() {
        $data = [
            'labels' => ['AC', 'DF', 'GO'],
            'series' => [
                [
                    1,
                    2,
                    3
                ],
                [
                    10,
                    23,
                    12
                ]
            ]
        ];

        $this->layout = null;
        //($this->response->setJsonContent($data));
        return json_encode($data);
    }
}
