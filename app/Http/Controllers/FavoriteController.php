<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
  public function favorite(Request $request)
  {
    $items=Shop::all();
    $user=Auth::user();
    $favorite=new Favorite();
    if($request->favorite==0){
      $favorite->where('user_id',Auth::user()->id)->where('shop_id',$request->id)->delete();
    }else{
      $favorite->user_id=Auth::user()->id;
      $favorite->shop_id=$request->id;
      $favorite->save();
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
        
        // 判定フラグ追加
      }
     
      
      $count=count($favorite_shop);
      
        return view('welcome',['items'=>$items,'user'=>$user,'count'=>$count],compact('favorite_shop'));
  }

  public function show()
  {
    $items=Shop::all();
    return view ('welcome',['items'=>$items]);
    }

}
