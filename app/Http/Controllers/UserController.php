<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use phpDocumentor\Reflection\Types\Object_;

class UserController extends Controller

{
    public function showInfo(){

        $data=[];
        $data['name']='raef bzd';
        $data['age']=22;
        $data['sexe']='homme';

         /*$obj = new \stdClass();
         $obj->name='raef';
         $obj->age=23;*/

        return (view('welcome',compact('data')));
    }

}
