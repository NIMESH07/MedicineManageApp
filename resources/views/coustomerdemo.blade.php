@extends('layouts.app')

@section('content')

<div id="loader" class="center"></div>
<style>
    #loader {
        border: 12px solid #f3f3f3;
        border-radius: 50%;
        border-top: 12px solid #444444;
        width: 70px;
        height: 70px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }

    .center {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }
    *
    {
        user-select: none;
    }
    #pricebox
    {
        position: absolute;
        top: 80px;
        left: 0;
        z-index: 3;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        box-sizing: border-box;
        width: auto;
        height: 45px;
        padding: .8em .8em .67em 1.2em;
        border-radius: 0 3px 3px 0;
        background-color: rgba(0,0,0,.7);
        color: white;
        user-select: none;
    }
    #price{
        color: #fff;
        font-size: 22px;
    }
    #pricecur
    {
        float: left;
        margin-right: 2px;
        color: #3baa33;
        font-size: 15px;
        line-height: 1em;
    }
    #like
    {
        cursor: pointer;
    }

</style>
<script>
    $(document).bind("contextmenu",function(e) {
 e.preventDefault();
});
    document.onreadystatechange = function()
     {
        if (document.readyState !== "complete")
        {
            document.querySelector(
            "body").style.visibility = "hidden";
            document.querySelector(
            "#loader").style.visibility = "visible";
        }
        else
        {
            document.querySelector(
            "#loader").style.display = "none";
            document.querySelector(
            "body").style.visibility = "visible";
        }
    };
</script>

<div class="container-fluid h-100" >
    <div class="row justify-content-center h-100">

        <!-- Left div Start   -->
        <div class="col-lg-2 col-sm-12 col-xs-12 hidden-md-down" id="yellow">
            <div class="card">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action" href="{{url('home')}}" >Home</ḍa>
                    <a class="list-group-item list-group-item-action" href="{{url('addmedicine')}}">Add New madicine</a>
                    <a class="list-group-item list-group-item-action" href="{{url('viewmedicine')}}">View All madicine</a>
                    <a class="list-group-item list-group-item-action" href="{{url('addcustomer')}}">Add New Coutomer</a>
                    <a class="list-group-item list-group-item-action active" href="{{url('coustomerview')}}">View All Coutomer</a>
                </div>
            </div>

        </div>

        <!-- Left div End   -->

<!-- rigth div Start   -->

        <div class="col-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}

                </div>

                <div class="card-body ">

                    <div class="d-flex justify-content-end">
                        <div class="flex"> print All Data </div>
                        <a href="pacd"><i class="flex fa fa-print " aria-hidden="true" style="font-size:24px"></i></a>
                    </div>

                    <!-- custome toast start-->
                    @include('layouts.flashdata')
                    <!-- Custom Toast End-->
                    <div class="container">
                        <div class="row justify-content-center">

                            @foreach ($data as $item)
                                <div class="col-lg-2 col-sm-1 m-1 border rounded btn-light">
                                    <figure class="figure">
                                        <img id="myimg" src='{{$item["imgname"] }}'  draggable="false"   class="mt-3 figure-img img-fluid rounded" alt="Img!!"/>
                                        <div id="pricebox">
                                            <span id="price">
                                                <span id="pricecur">$</span>
                                                {{ $item['id'] }}
                                            </span>
                                        </div>
                                        <figcaption class="figure-caption">{{ $item['name'] }}</figcaption>
                                    </figure>

                                    {{ date('d-m-y') }}
                                        <span id="like">
                                        @if ($item['status']==0)
                                            ❤
                                        @else
                                            🤍
                                        @endif
                                        </span>
                                    <span style="margin-left:30px;cursor: pointer; ">📲</span>
                                </div>
                            @endforeach

                        </div>
                    <div class="container">
                        <div class="row mt-3 justify-content-center">
                            <div class="col-lg-4">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        <!-- rigth div End   -->

        </div>

    </div>
</div>
@endsection

