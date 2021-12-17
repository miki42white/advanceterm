<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rese</title>
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>
    .user-name{
      text-align: right;
    }
    .reserve-table{
      margin-left:5%;
      width:100%;
    }
    .reserve-box{
      background-color:#3366ff;
      border-radius: 5px;
      width:90%;
      margin:5px auto;
      padding:10px;
    }
    .reserve-item,
    .reserve-item-content{
      color:#ffff;
    }
    img {
      width: 100%;
      height: auto;
    }
    .card {
      width:50%;
      border: 1px solid #e9eaea;
      border-radius: 5px;
      box-shadow: 3px 3px 4px #c0c0c0;
    }
    .text-box {
      padding: 15px;
    }
    .content-img {
      text-align: center;
      width:100%;
    }
    .text-wrap{
      margin-left: 10px;
    }
    .title{
      font-size: 20px;
    }
    .tag{
      font-size: 10px;
    }
    .btn-wrap{
      text-align: right;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <x-header :user="$user"/>
    <h2 class="user-name">{{auth()->user()->name}}さん</h2>
    <div class="row mt-5">
      <div class="reserve-confirm col-12 col-sm-6">
        <h2>予約状況</h2>
        @foreach($reserves as $reserve)
        <div class="reserve-box">
          <table>
            <tr>
              <th class="reserve-item"><i class="far fa-clock"></i>予約</th>
            </tr>
            <tr>
              <th><p class="reserve-item">Shop</p></th>
              <td><p class="reserve-item-content">{{$reserve['shop_id']}}</p></td>
            </tr>
            <tr>
              <th><p class="reserve-item">date</p></th>
              <td class="reserve-item-content" id="output_date">{{$reserve['date']}}</td>
            </tr>
            <tr>
              <th><p class="reserve-item">time</p></th>
              <td class="reserve-item-content" id="output_time">{{$reserve['time']}}</td>
            </tr>
            <tr>
              <th><p class="reserve-item">number</p></th>
              <td class="reserve-item-content" id="output_number">{{$reserve['number']}}</td>
            </tr>
            <form action="/mypage/delete" method="post">
              @csrf
              <input type="hidden" name="id" value={{$reserve['id']}}>
              <div class="btn-wrap">
                <input type="submit" value="×" class="delete-btn">
              </div>
            </form>
          </table>
        </div>
        @endforeach
      </div>
      <div class="reserve-confirm col-12 col-sm-6">
        <h2>お気に入り店舗</h2>
        <div class="row">
          @foreach($favorites as $favorite)
          <div class="card col-6">
            <div class="content-img">
              <img src="{{asset($favorite['img_path'])}}">
            </div>
            <div class="text-box">
              <div class="text-wrap">
                <h2 class="title">{{$favorite['name']}}</h2>
                <span class="tag">#{{$favorite['area']}}</span>
                <span class="tag">#{{$favorite['genle']}}</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</body>
</html>