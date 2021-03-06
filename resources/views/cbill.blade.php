@extends('layouts.app')

@section('content')
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">

        <!-- Left div Start   -->
        <div class="col-2 hidden-md-down" id="yellow">
            <div class="card">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action active" href="{{url('home')}}" >Home</a>
                    <a class="list-group-item list-group-item-action" href="{{url('addmedicine')}}">Add New madicine</a>
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
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div  class="row card-body">
                    <div class="row">
                        <div class="col-lg-12 ">
                        <form action="">
                            <Select name="cus" class="select">
                                @foreach ($cus as $item)
                                    <option class="option" value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </Select>
                            <button class="btn-success">Add Cus</button>
                        </form>
                        </div>
                    </div>
                    <div class="row">
                     <div class="col">
                         <form action="">
                            <Select name="mad" class="select">
                                @foreach ($mad as $item)
                                    <option class="option" value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </Select>
                            <button class="btn-success">Add Mad</button>
                        </form>
                     </div>
                     </div>
            </div>
        </div>

        <!-- rigth div End   -->

    </div>
</div>
@endsection
