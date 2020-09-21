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
</style>
<script>
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

<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">

        <!-- Left div Start   -->
        <div class="col-2 hidden-md-down" id="yellow">
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
                                <div class="col-lg-2 col-sm-1 m-1 border rounded" >
                                    <figure class="figure">
                                        <img id="myimg" src='{{$item["imgname"] }}'  draggable="false"   class="mt-3 figure-img img-fluid rounded" alt="Img!!"/>
                                        <figcaption class="figure-caption">{{ $item['name'] }}</figcaption>
                                    </figure>
                            </div>
                            @endforeach

                        </div>
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

