<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    public function index(){
      $items=Shop::all();
      $user=Auth::user();
      if(!isset($user)){
        return view ('welcome',['items'=>$items,'user'=>$user]);
      }

        $favorite=Favorite::all();
        // shop_idだけの配列
        $favorite_shop=array();
        //favorite フラグ
        $favorite_flg=false;
        // shop_idを詰め直す
        foreach($items as $item){
          
          foreach($favorite as $fav){
            
            if($user->id==$fav->user_id && $item->id == $fav->shop_id){
              
              $favorite_shop[]=$fav->shop_id;
              $favorite_flg=true;
            }
          }
          if($favorite_flg==false){
            $favorite_shop[]=0;
          }
          $favorite_flg=false;
        
      }
      $count=count($favorite_shop);
      
        return view('welcome',['items'=>$items,'user'=>$user,'count'=>$count],compact('favorite_shop'));
    }

    public function showdetail($id){
      $items=Shop::findOrFail($id);
      $user=Auth::user();
      return view('detail',['items'=>$items,'user'=>$user]);
    }

    public function search(Request $request){
      $query = Shop::query();
      if($request->filled('name')){
      $query->where('name','like','%'.$request->input('name') .'%');
      }
      if ($request->filled('area')) {
      $query->where('area', $request->input('area'));
      }
      if ($request->filled('genle')) {
      $query->where('genle', $request->input('genle'));
      }
      $items=$query->get();
      return view('welcome', ['items' => $items]);

    }

    public function show(){
      return view('header');
    }
  }