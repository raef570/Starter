<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function get_offers(){
        $offers=Offer::get();
        foreach($offers as $offer){
            return "<table border='1'><td>".$offer['id']."</td><td>".$offer['name']."</td><td>".$offer['price']."</td></table>";

        }



    }

    public function create(){
        return view('crud.ajout');

        }

    public function store(Request $request){

        //validation request before insert

        $validations=$this->getValidations();
        $msgs=$this->getMsgs();

        $validation=Validator::make($request->all(), $validations, $msgs);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInputs($request->all()) ;
        }


        //insert data into DB
        Offer::create(['name'=>$request->name,
                        'price'=>$request->price,
                        'details'=>$request->details,
        ]);
        return redirect()->back()->with(['success'=>'votre offre à été inseré avec succés']) ;

    }


    protected function  getValidations(){
        return $validations=[
            'name'=>'required|max:10|unique:offers,name',
            'price'=>'required|numeric',
            'details'=>'required'
        ];
    }
    protected function getMsgs(){
        return $msgs=[
            'name.required'=>__("msgs.saisir le nom de l'offre"),
            'price.required'=>__("msgs.saisir le prix de l'offre"),
            'details.required'=>__("msgs.saisir les details de l'offre"),
            'name.max'=>'le nom doit comporter au maximumum 10 caracters',
            'name.unique'=>'ce nom de l\'offre est deja existe'
        ];
    }

}
