<!DOCTYPE html>
<html lang=ja>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rese</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <style>
            .search-box{
            text-align: right;
            }
            img {
            width: 100%;
            height: auto;
            }
            .card {
            border: 1px solid #e9eaea;
            border-radius: 5px;
            box-shadow: 3px 3px 4px #c0c0c0;
            margin-bottom: 20px;
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
            .detail-btn a{
            text-decoration: none;
            color:#ffffff;
            }
            .detail-btn{
            color:#ffffff;
            border-radius: 5px;
            background-color: #3366ff;
            padding:5px 10px;
            border:1px solid #3366ff;
            }
            .btn-wrap{
            display: flex;
            justify-content: space-between;
            margin-left: 5px;
            }
            .far{
            display: table-cell;
            vertical-align: middle;
            height:16px;
            font-size: 25px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
        <x-header :user="$user"/>
        <div>
            <form action="/search" method="post" class="search-box">
                @csrf
                <select name="area" id="area">
                    <option value="">All area</option>
                    <option value="東京都">東京都</option>
                    <option value="大阪府">大阪府</option>
                    <option value="福岡県">福岡県</option>
                </select>
                
                <select name="genle" id="genle">
                    <option value="">All genle</option>
                    <option value="寿司">寿司</option>
                    <option value="焼肉">焼肉</option>
                    <option value="居酒屋">居酒屋</option>
                    <option value="イタリアン">イタリアン</option>
                    <option value="ラーメン">ラーメン</option>
                </select>
                <input type="text" name="name">
                <input type="submit" value="検索">
            </form>
        </div>
            <div class="row mt-3">
                @foreach($items as $item)
                <div class="card col-6 col-md-4 col-lg-3">
                    <div class="content-img">
                        <img src="{{$item['img_path']}}" />
                    </div>
                    <div class="text-box">
                        <div class="text-wrap">
                            <h2 class="title">{{$item['name']}}</h2>
                            <span class="tag">#{{$item['area']}}</span>
                            <span class="tag">#{{$item['genle']}}</span>
                        </div>
                        <div class="btn-wrap">
                            <button class="detail-btn"><a href="/detail/{{$item["id"]}}" >詳しくみる</a></button>
                            <div class="d-inline float-right">
                                @if(isset($user))
                                    @if($favorite_shop[$loop->iteration-1]!=0)
                                        <a href="/favorite?id={{$item["id"]}}&favorite=0"><i class="fas fa-heart fa-2x my-pink"></i></a>
                                    @else
                                        <a href="/favorite?id={{$item["id"]}}&favorite=1"><i class="far fa-heart fa-2x my-gray"></i></a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
