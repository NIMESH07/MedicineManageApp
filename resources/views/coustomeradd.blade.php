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

<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">

        <!-- Left div Start   -->
        <div class="col-2 hidden-md-down" id="yellow">
            <div class="card">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action"  href="{{url('home')}}">Home</a>
                    <a class="list-group-item list-group-item-action" href="{{url('addmedicine')}}">Add New madicine</a>
                    <a class="list-group-item list-group-item-action" href="{{url('viewmedicine')}}">View All madicine</a>
                    <a class="list-group-item list-group-item-action active" href="{{url('addcustomer')}}">Add New Coutomer</a>
                    <a class="list-group-item list-group-item-action" href="{{url('coustomerview')}}">View All Coutomer</a>
                    <a class="list-group-item list-group-item-action" href="{{url('showmail')}}">Mail</a>
                </div>
            </div>

        </div>

        <!-- Left div End   -->

<!-- rigth div Start   -->

        <div class="col-10">

            @include('layouts.flashdata')
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Add New Coustomer') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ url('addcustomerdata') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-3 col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                        <div class="col-xl-3 col-md-6">
                                            <input id="name" value="{{ old('name') }}" type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  autocomplete="off" autofocus>

                                        </div>


                                            @error('name')
                                            <div class="col-xl-3 form-control alert alert-danger">{{ $message }}</div>
                                             @enderror
                                    </div>



                                    <div class="form-group row">
                                        <label for="ts" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>
                                        <div class="col-xl-3 col-md-6">
                                            <input id="mn" value="{{ old('mobno') }}" type="number" class="form-control @error('mobno') is-invalid @enderror" name="mobno"  autofocus>

                                        </div>
                                        @error('mobno')
                                            <div class="col-xl-3 form-control alert alert-danger">{{ $message }}</div>
                                         @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                        <div class="col-xl-3 col-md-6">
                                            <textarea id="address" value="{{ old('add') }}" type="text" class="form-control  @error('add') is-invalid @enderror" name="add" autocomplete="off"  autofocus></textarea>

                                        </div>
                                        @error('add')
                                            <div class="col-xl-3 form-control alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group row">
                                        <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                        <div class="col-xl-3 col-md-6">
                                            <input  type="file" id="address" value="{{ old('img') }}" class="form-control  @error('img') is-invalid @enderror"  name="img">
                                            @error('img')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Add') }}
                                            </button>
                                            <a href="{{url('coustomerview')}}">View All madicine</a>
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
