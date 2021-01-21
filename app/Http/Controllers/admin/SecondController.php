<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class SecondController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('info1','info2','info');
    }
    public function info(){
        return 'raef 22 ans';

    }
    public function info1()
    {
        return 'raef 22 ans 1';

    }
    public function info2(){
        return 'raef 22 ans 2';

    }
}
