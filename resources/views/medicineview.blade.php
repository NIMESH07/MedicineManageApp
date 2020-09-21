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
                    <a class="list-group-item list-group-item-action" href="{{url('home')}}" >Home</a>
                    <a class="list-group-item list-group-item-action" href="{{url('addmedicine')}}">Add New madicine</a>
                    <a class="list-group-item list-group-item-action active" href="{{url('viewmedicine')}}">View All madicine</a>
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

                <div class="card-body">
                    <a href="excel" class="text-right">Download Excel</a>
        <!-- custome toast start-->
                   @include('layouts.flashdata')
        <!-- Custom Toast End-->
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Total Stock</th>
                            <th>Need Stock</th>
                            <th>Current Stock</th>
                            <th>Ex Date</th>
                            <th>Price</th>
                            <th>MRP</th>
                            <th>OS</th>
                            <th>U/D</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php

                                foreach($data as $z)
                                {
                                    echo "<tr><td>".$z->id."</td>";
                                    echo "<td>".$z->name."</td>";
                                    echo "<td>".$z->ts."</td>";
                                    echo "<td>".$z->ns."</td>";
                                    echo "<td>".$z->cs."</td>";
                                    echo "<td>".$z->exdate."</td>";
                                    echo "<td>".$z->price."</td>";
                                    echo "<td>".$z->mrp."</td>";
                                    echo "<td>".$z->orderstatus."</td>";

                                    echo "<td><a href='viewmedicinewithid?a=".base64_encode($z->id)."'><img alt='star' width='16' height='16' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADgAAABACAYAAABP97SyAAABzElEQVRoQ+3aa29CIQwG4Ne5y892/uxd3BaW0wXPDoeWFmmJftFEojwUoW08YPLHYXIf7sDoEY4Wwddlwem5uv6RgAl1WkRnACxkFGCOo6ixkBGAWzg20jtwD8dCegZycFWkV6AEt4v0CGzBFZGzARP06nT1CEyT1ETxCukVaIb0DDRBjgZyckvNdj2PBEpyyxbk72EzCtiSW0qQfyfpCKAmt+Qgh14T4gluFHyiBbplBDm4am6ZFbxUG7pI1SS4FmSxNrxFBFtwEiTdl5vti95ADY6L3O3L9ARa4NTIXkBLnArZA9gD14y0BvbE/av1qk1RwLR17w6XFsAqgi5xVkC3OAuga5wW6B6nAYbAtQLD4FqAoXBSYDicBBgSxwWGxXGAoXE1YHjcHnAKXAk4DW4LOBVuDZwOlwOnxBFwWhwBv1e9jXWVv36f0wppbhJJPpwzNmF6AVl/teJMUjOmF9AFjrbo16r5pN2ibnAEvAB4yLZBrdO295t0hbMGusMR8BPAURlBlzgCfgB4VADd4kpAyansGkfAdwBPEtUy1j2OgG8AnoXAELhWYBgcAV+ydC3dcXTPlV4Lgz12eO1SHzs7g2+/Aw0WcehH/AD2BItBxVBltgAAAABJRU5ErkJggg=='></a>
                                            <a href='deletemedicinewithid?a=$z->id'><img alt='star' width='16' height='16' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABt0lEQVR4Xu2asS5FQRRF1xMlURCdfyBRoVLwASKhkfgGjT/Q+AWlBNHTqBGdP1BTUSrIxHskgpeZfea5yezb3Gb2mXP2nDN3FbdH40+v8fqxAe6Axh3wCDTeAL4ERzECS8AlMJnZbc/AGnCbqctaXtuAFeACmMjK6mtxMmEduCnUD5WVGrAMzA2JPgUcCsUPwr8Ae0B6//U8ANdDK/62oNSAc2Ajd7PK60+Brdw9bECuY/317gCPQON3QOHkdE9Wegl2r5LCjCIMyP70FOb6m+xEiRdhwJuSQIBWqkES95O3AQGnqISQDlESuwM+HPAIKP0boJW6WBJ7BDwCvgN8Cfor4M+gOcAgFAAzSgiJZSSxQcggZBAyCBmEDEIGIYOQQjEBWollJLFByCBkEDIIGYQMQgah/wShtPeYwhIRHPAETCtJCNpHYFbQh/wsfQZsKkkI2vR3yLagDzFgHrgDxpVECrSvwCJwX6D9lESMQAq2AxyN0IRU/C5wrBSftFEGpFgLwD6wCsyoif2gTxdeum+ugAP15AfxIw2oUHP9kDagvsfd3sEd0O3zqZ+dO6C+x93eofkOeAeMzkZBMeOpvQAAAABJRU5ErkJggg=='></a>
                                            <a href='printmedicinewithid?mid=".base64_encode($z->id)."'>print</a>
                                        </td>";
                                    echo "</tr>";
                                }

                            @endphp
                        </tbody>
                    </table>

                     {{ $data->links() }}
                </div>
            </div>
        </div>

        <!-- rigth div End   -->

    </div>

</div>
@endsection

