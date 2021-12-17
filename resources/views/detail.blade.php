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
    .shop-img{
      width:100%;
    }
    .shop-img img{
      width:100%;
    }
    .reserve-box{
      background-color:#3366ff;
      border-radius: 5px;
      margin:0 auto;
    }
    .reserve-title,
    .reserve-item,
    .reserve-item-content{
      color:#ffffff;
    }
    .reserve-title{
      text-align: left;
      margin-top: 10px;
    }
    .reserve-item{
      text-align: left;
      margin-left: 5%;
    }
    .reserve-item-content{
      margin-left: 10px;
    }
    .input-item{
    border:1px solid #eeeeee;
    border-radius: 3px;
    width:80%;
    height:30px;
    margin-bottom: 10px;
  }
    .reserve-table{
      margin-left:5%;
      width:100%;
    }
    .confirm{
      background-color:#75a9ff;
      border-radius: 5px;
      width:90%;
      margin:5px auto;
    }
    .btn-wrap{
      text-align: center;
      margin: 10px auto;
    }
    .reserve-btn{
      background-color: #3300ff;
      border-radius: 5px;
      padding:5px 15px;
      color:#ffffff;
    }
    reserve-btn:hover{
      cursor: pointer;
      opacity: 0.7;
    }
  </style>
</head>
<body>
<div class="container">
<x-header :user="$user"/>
    <div class="row mt-5">
      <div class="shop-detail col-12 col-md-6">
        <h2>{{$items['name']}}</h2>
        <div class="shop-img">
          <img src="{{asset($items['img_path'])}}">
        </div>
        <span class="tag">#{{$items['area']}}</span>
        <span class="tag">#{{$items['genle']}}</span>
        <p>{{$items['description']}}</p>
      </div>
      
      <div class="reserve-box col-12 col-md-6">
        <table class=reserve-table>
          <tr>
            <th>
              <h2 class=reserve-title>予約</h2>
            </th>
          </tr>
          <form action="/done" method="post">
            @csrf
            <tr>
              <td><input class="input-item" type="date" name="date" id="input_date"></td>
            </tr>
            <tr>
              <td>
                <input type="time" class="input-item" name="time" id="input_time" min="09:00" max="21:00">
              </td>
            </tr>
            <tr>
              <td>
                <select class="input-item" name="number" id="input_number">
                  <option value="1人">1人</option>
                  <option value="2人">2人</option>
                  <option value="3人">3人</option>
                  <option value="4人">4人</option>
                  <option value="5人">5人</option>
                  <option value="6人">6人</option>
                  <option value="7人">7人</option>
                  <option value="8人">8人</option>
                  <option value="9人">9人</option>
                  <option value="10人">10人</option>
                </select>
              </td>
            </tr>
          </table>
          <div class="confirm">
            <table>
              <tr>
                <th><p class="reserve-item">Shop</p></th>
                <td><p class="reserve-item-content">{{$items["name"]}}</p></td>
              </tr>
              <tr>
                <th><p class="reserve-item">date</p></th>
                <td class="reserve-item-content" id="output_date"></td>
              </tr>
              <tr>
                <th><p class="reserve-item">time</p></th>
                <td class="reserve-item-content" id="output_time"></td>
              </tr>
              <tr>
                <th><p class="reserve-item">number</p></th>
                <td class="reserve-item-content" id="output_number"></td>
              </tr>
            </table>
          </div>
          <input type="hidden" name="id" value={{$items["id"]}}>
          <div class="btn-wrap">
            <input class="reserve-btn" type="submit" value="予約する">
          </div>
        </form>
      </div>
    </div>
    </div>
    <script language="javascript" type="text/javascript">
    function func1() {
      var input_message = document.getElementById("input_date").value;
      document.getElementById("output_date").innerHTML = input_message.toUpperCase();
    }
    document.getElementById("input_date").onchange = func1;

    function func2() {
      var input_message = document.getElementById("input_time").value;
      document.getElementById("output_time").innerHTML = input_message.toUpperCase();
    }
    document.getElementById("input_time").onchange = func2;

    function func3() {
      var input_message = document.getElementById("input_number").value;
      document.getElementById("output_number").innerHTML = input_message.toUpperCase();
    }
    document.getElementById("input_number").onchange = func3;
</script>
</body>
</html>