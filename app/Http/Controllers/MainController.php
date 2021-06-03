<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\Car;
use App\Pilot;

class MainController extends Controller
{
    // HOME
   public function home(){

   $cars = Car::all();
    //dd($cars);

   return view('pages.home', compact('cars'));
   }

   // SINGOLO PILOTA
   public function pilot($id){

   $pilots = Pilot::findOrFail($id);
    //dd($pilots);

   return view('pages.pilot', compact('pilots'));
   }

   // CREA SINGOLA MACCHINA
   public function create(){

    $brands = Brand::all();

    $pilots = Pilot::all();
    //dd($brands);

   return view('pages.create', compact('brands', 'pilots'));
   }

   // ---------------------------------

   public function store(Request $request) {
   // dd($request -> all());

   $validate = $request -> validate([
   'name' => 'required|string',
   'model' => 'required|string',
   'kw' => 'required|integer',
   ]);
   // dd($validate);

   $brand = Brand::findOrFail($request -> get('brand_id'));

   $car = Car::make($validate);

   // associo il brand e salvo
   $car -> brand() -> associate($brand);

   $car -> save();

   // associo i piloti e salvo nuovamente
   $car -> pilots() -> attach($request -> get('pilots_id'));

   $car -> save();

//    dd($brand);

   return redirect() -> route('home');
   }

}
