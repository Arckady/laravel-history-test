<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function test ()
    {
//        return 123;
        return view('test', [
            'number' => 123
        ]);
    }
}
