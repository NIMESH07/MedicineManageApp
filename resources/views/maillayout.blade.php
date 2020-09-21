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
                    <a class="list-group-item list-group-item-action " href="{{url('home')}}" >Home</a>
                    <a class="list-group-item list-group-item-action" href="{{url('addmedicine')}}">Add New madicine</a>
                    <a class="list-group-item list-group-item-action" href="{{url('viewmedicine')}}">View All madicine</a>
                    <a class="list-group-item list-group-item-action" href="{{url('addcustomer')}}">Add New Coutomer</a>
                    <a class="list-group-item list-group-item-action" href="{{url('coustomerview')}}">View All Coutomer</a>
                    <a class="list-group-item list-group-item-action active" href="{{url('showmail')}}">Mail</a>
                </div>
            </div>

        </div>

        <!-- Left div End   -->

        <!-- rigth div Start   -->

        <div class="col-10">
            @include('layouts.flashdata')
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div  class="row card-body">

					<form method="GET" action="{{ url('sendmail') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row m-2">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Emsil Id') }}</label>
                            <div class="col">
                                <input id="email" value="{{ old('email') }}" type="email" class="form-control  @error('email') is-invalid @enderror"  name="mail"  autofocus>

                            </div>


                                @error('email')
                                <div class="col-xl-3 form-control alert alert-danger">{{ $message }}</div>
                                 @enderror
                        </div>



                        <div class="form-group row m-2">
                            <label for="ts" class="col-form-label text-md-right">{{ __('title') }}</label>
                            <div class="col">
                                <input id="title" value="{{ old('mobno') }}" type="text" class="form-control @error('title') is-invalid @enderror" name="title"  autofocus>

                            </div>
                            @error('title')
                                <div class="col-xl-3 form-control alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>

                        <div class="form-group row m-2">
                            <label for="name" class="col-form-label text-md-left">{{ __('Message') }}</label>
                            <div class="col">
                                <textarea id="body" value="{{ old('body') }}" type="text" class="form-control  @error('body') is-invalid @enderror" name="body" autocomplete="off"  autofocus></textarea>

                            </div>
                            @error('body')
                                <div class="col-xl-3 form-control alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Mail') }}
                                </button>

                            </div>
                        </div>
                    </form>
				</div>
			</div>

        <!-- rigth div End   -->

	</div>
</div>
</div>
@endsection

