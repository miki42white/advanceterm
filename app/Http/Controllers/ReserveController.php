<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReserveRequest;
class ReserveController extends Controller
{
    public function create(ReserveRequest $request)
  {
    $reserve= new Reserve();
    $reserve->user_id=Auth::user()->id;
    $reserve->shop_id=$request->id;
    $reserve->date=$request->date;
    $reserve->time=$request->time;
    $reserve->number=$request->number;
    $reserve->save();
    return view('done');
  }

  public function show()
  {
    return view('done');
}
}