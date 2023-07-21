@extends('layouts.app')

@section('css')
    <style type="text/css">
    /* 40128b */

    body{
        background: #57c1e5;
    }
    

    .title{
        font-family: '04b', sans-serif;
        text-align: center;
        color: #40128b;
    }

    .map-container{
        overflow-x: auto;
        text-align: center;
        position: relative;
        width: 700px;
        height: 495px;
        background-color: #57c1e5;
    }

    .map_image{
        width: 700px;
        height: 495px;
    }

    .point{
        position: absolute;
    }
    #ta-bw{
        width: 77px;
        height: auto;
        bottom: 149px;
        left: 301.3px;
    }

    #tb-bw{
        width: 91px;
        height: auto;
        bottom: 177px;
        right: 238px;
    }

    #tc-bw{
        width: 98px;
        height: auto;
        top: 201px;
        right: 148px;
        z-index: 1;
    }

    #td-bw{
        width: 70px;
        height: auto;
        top: 153px;
        right: 155px;
        /* z-index: 1; */
    }

    #te-bw{
        width: 121px;
        height: auto;
        top: 151px;
        right: 234px;
        z-index: 1;
    }

    #tf-bw{
        width: 130px;
        height: auto;
        bottom: 197px;
        left: 225px;
    }

    #tg-bw{
        width: 99px;
        height: auto;
        top: 80px;
        right: 231px;
    }
    </style>
@endsection

@section('content')

<section class="map-section">
    <h1 class="title">Engineering Tour</h1>
    <div class="container-fluid my-0 d-flex justify-content-center">
        <div class="map-container">
            <img src="{{ asset('../images/assets_gedung/map_rgb.png') }}" class="map_image" alt=""> 
            <img src="{{ asset('../images/assets_gedung/bw/TA_bw.png') }}" alt="" class="point" id="ta-bw">
            <img src="{{ asset('../images/assets_gedung/bw/TB_bw.png') }}" alt="" class="point" id="tb-bw">
            <img src="{{ asset('../images/assets_gedung/bw/TC_bw.png') }}" alt="" class="point" id="tc-bw">
            <img src="{{ asset('../images/assets_gedung/bw/TD_bw.png') }}" alt="" class="point" id="td-bw">
            <img src="{{ asset('../images/assets_gedung/bw/TE_bw.png') }}" alt="" class="point" id="te-bw">
            <img src="{{ asset('../images/assets_gedung/bw/TF_bw.png') }}" alt="" class="point" id="tf-bw">
            <img src="{{ asset('../images/assets_gedung/bw/TG_bw.png') }}" alt="" class="point" id="tg-bw">
            
        </div>
        
    </div>  
</section>
    
@endsection