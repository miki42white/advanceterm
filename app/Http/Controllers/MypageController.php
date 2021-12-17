<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reserve;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function show(){
        $reserves=Reserve::where('user_id',Auth::user()->id)->get();

        $favorites=Shop::whereIn('id',function($query){
        $query->select('shop_id')
        ->from('favorites')
        ->where('user_id',Auth::user()->id);
        })->get();
        $user=Auth::user();
        return view ('mypage',['reserves'=>$reserves,'favorites'=>$favorites,'user'=>$user]);
    }

    public function delete(Request $request){
        Reserve::where('id',$request->id)->delete();
        $reserves=Reserve::where('user_id',Auth::user()->id)->get();
        $favorites=Shop::whereIn('id',function($query){
        $query->select('shop_id')
        ->from('favorites')
        ->where('user_id',Auth::user()->id);
        })->get();
        $user=Auth::user();
        return view('mypage',['reserves'=>$reserves,'user'=>$user,'favorites'=>$favorites]);
    }
}
