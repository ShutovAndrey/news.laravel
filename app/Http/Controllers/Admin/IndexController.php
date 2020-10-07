<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function add() {
        return view('admin.add');
    }

        public function test2() {
        return view('admin.test2');
    }


}
