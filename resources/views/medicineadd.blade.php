<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



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
    document.onreadystatechange = function() {
        if (document.readyState !== "complete") {
            document.querySelector(
            "body").style.visibility = "hidden";
            document.querySelector(
            "#loader").style.visibility = "visible";
        } else {
            document.querySelector(
            "#loader").style.display = "none";
            document.querySelector(
            "body").style.visibility = "visible";
        }
    };
</script>
@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
@endif
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">

        <!-- Left div Start   -->
        <div class="col-2 hidden-md-down" id="yellow">
            <div class="card">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action"  href="{{url('home')}}">Home</a>
                    <a class="list-group-item list-group-item-action active" href="{{url('addmedicine')}}">Add New madicine</a>
                    <a class="list-group-item list-group-item-action" href="{{url('viewmedicine')}}">View All madicine</a>
                    <a class="list-group-item list-group-item-action" href="{{url('addcustomer')}}">Add New Coutomer</a>
                    <a class="list-group-item list-group-item-action" href="{{url('coustomerview')}}">View All Coutomer</a>
                    <a class="list-group-item list-group-item-action" href="{{url('showmail')}}">Mail</a>
                </div>
            </div>

        </div>

        <!-- Left div End   -->

<!-- rigth div Start   -->

        <div class="col-10">



            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Add New Medicine') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ url('addmedicinedata') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" required autocomplete="off" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="ts" class="col-md-4 col-form-label text-md-right">{{ __('Total Stock') }}</label>
                                        <div class="col-md-6">
                                            <input id="ts" type="number" class="form-control" name="ts" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Need Stock') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="number" class="form-control" name="ns" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Current stock') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="number" class="form-control" name="cs" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="number" class="form-control" name="price" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('MRP') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="number" class="form-control" name="mrp" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ex Date') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="date" class="form-control" name="exdate" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Add') }}
                                            </button>
                                            <a href="{{url('viewmedicine')}}">View All madicine</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>








        <!-- rigth div End   -->

    </div>
</div>
@endsection

</body>
</html>
