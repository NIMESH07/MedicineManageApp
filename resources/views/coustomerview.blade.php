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
                    <a class="list-group-item list-group-item-action" href="{{url('showmail')}}">Mail</a>
                </div>
            </div>

        </div>

        <!-- Left div End   -->

<!-- rigth div Start   -->

        <div class="col-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body ">

                    <div class="d-flex justify-content-end">
                        <div class="flex"> print All Data </div>
                        <a href="pacd"><i class="flex fa fa-print " aria-hidden="true" style="font-size:24px"></i></a>
                    </div>

        <!-- custome toast start-->
                    @include('layouts.flashdata')
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add Coustomer</a>
                   <a href="{{ url()->previous() }}">Back</a>
        <!-- Custom Toast End-->
                    <table id="Coustomer" class="table ">
                        <thead class="thead-light ">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>U/D</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php

                                foreach($data as $z)
                                {
                                    //<img  src=".asset('storage/'. $z->imgname)." alt='!!' width='40'>
                                    echo "<tr><td>".$z->id."</td>";

                                    echo "<td>

                                        <img  src='$z->imgname' alt='!!' width='40'> "
                                        .$z->name."</td>";
                                    echo "<td>".$z->mobile_no."</td>";
                                    echo "<td>".$z->address."</td>";
                                    echo "<td>".$z->status."</td>";
                                    echo "<td><a href='viewcoustomerwithid?a=". base64_encode($z->id)."'><img alt='star' width='16' height='16' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADgAAABACAYAAABP97SyAAABzElEQVRoQ+3aa29CIQwG4Ne5y892/uxd3BaW0wXPDoeWFmmJftFEojwUoW08YPLHYXIf7sDoEY4Wwddlwem5uv6RgAl1WkRnACxkFGCOo6ixkBGAWzg20jtwD8dCegZycFWkV6AEt4v0CGzBFZGzARP06nT1CEyT1ETxCukVaIb0DDRBjgZyckvNdj2PBEpyyxbk72EzCtiSW0qQfyfpCKAmt+Qgh14T4gluFHyiBbplBDm4am6ZFbxUG7pI1SS4FmSxNrxFBFtwEiTdl5vti95ADY6L3O3L9ARa4NTIXkBLnArZA9gD14y0BvbE/av1qk1RwLR17w6XFsAqgi5xVkC3OAuga5wW6B6nAYbAtQLD4FqAoXBSYDicBBgSxwWGxXGAoXE1YHjcHnAKXAk4DW4LOBVuDZwOlwOnxBFwWhwBv1e9jXWVv36f0wppbhJJPpwzNmF6AVl/teJMUjOmF9AFjrbo16r5pN2ibnAEvAB4yLZBrdO295t0hbMGusMR8BPAURlBlzgCfgB4VADd4kpAyansGkfAdwBPEtUy1j2OgG8AnoXAELhWYBgcAV+ydC3dcXTPlV4Lgz12eO1SHzs7g2+/Aw0WcehH/AD2BItBxVBltgAAAABJRU5ErkJggg=='></a>
                                             <a href='deletecustomerwithid?a=$z->id'><img alt='star' width='16' height='16' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABt0lEQVR4Xu2asS5FQRRF1xMlURCdfyBRoVLwASKhkfgGjT/Q+AWlBNHTqBGdP1BTUSrIxHskgpeZfea5yezb3Gb2mXP2nDN3FbdH40+v8fqxAe6Axh3wCDTeAL4ERzECS8AlMJnZbc/AGnCbqctaXtuAFeACmMjK6mtxMmEduCnUD5WVGrAMzA2JPgUcCsUPwr8Ae0B6//U8ANdDK/62oNSAc2Ajd7PK60+Brdw9bECuY/317gCPQON3QOHkdE9Wegl2r5LCjCIMyP70FOb6m+xEiRdhwJuSQIBWqkES95O3AQGnqISQDlESuwM+HPAIKP0boJW6WBJ7BDwCvgN8Cfor4M+gOcAgFAAzSgiJZSSxQcggZBAyCBmEDEIGIYOQQjEBWollJLFByCBkEDIIGYQMQgah/wShtPeYwhIRHPAETCtJCNpHYFbQh/wsfQZsKkkI2vR3yLagDzFgHrgDxpVECrSvwCJwX6D9lESMQAq2AxyN0IRU/C5wrBSftFEGpFgLwD6wCsyoif2gTxdeum+ugAP15AfxIw2oUHP9kDagvsfd3sEd0O3zqZ+dO6C+x93eofkOeAeMzkZBMeOpvQAAAABJRU5ErkJggg=='></a>
                                             <a href='pin?imgname=".base64_encode($z->imgname)."'>file download</a>
                                        </td>";
                                    echo "</tr>";
                                }

                            @endphp
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>

        <!-- rigth div End   -->

        </div>

    </div>
</div>

  <!-- Modal -->
  <div class="modal fade hide" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Coustomer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="cform">
              @csrf
              <div class="form-group">
                  <label for="name">Name</label>
                  <input class="form-control" type="text" name="name" id="name">
              </div>
              <div class="form-group">
                <label for="Mobile_no">Mobile_no</label>
                <input class="form-control" type="text" name="mobile_no" id="mobile_no">
            </div>
            <div class="form-group">
                <label for="add">Address</label>
                <input class="form-control" type="text" name="address" id="address">
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
      $("#cform").submit(function(e){
        e.preventDefault();

        let cname=$("#name").val();
        let mobile_no=$("#mobile_no").val();
        let address=$("#address").val();
        let _token= $("#input[name=_token]").val();

        $.ajax({
            url:"{{ route('c.add') }}",
            type:"GET",
            data:{
                name:cname,
                mobile_no:mobile_no,
                address:address,
                _token:_token,
            },
            success:function(response)
            {
                if(response)
                {
                    $("#Coustomer tbody").prepend('<tr><td>'+response.id+'</td><td>'+response.name+'</td><td>'+response.mobile_no+'</td><td>'+response.address+'</td><td>'+response.status+'</td></tr>');
                    $("#cform")[0].reset();
                    document.getElementsByClassName('modal-backdrop fade show')[0]. style.visibility = 'hidden';
                    $("#exampleModal").modal('hide');
                }
                else
                {
                    $("#exampleModal").modal('show');
                }
            }
        });
      });
  </script>
@endsection

