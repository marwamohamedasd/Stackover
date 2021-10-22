<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {

       /* for ()
        Vote::create([
            'vota',
            '',

        ]);*/

    }




    public function index() {

        dd(in_array('5', ['5'], TRUE));
    }
}
