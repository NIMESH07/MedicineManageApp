@if(session()->has('msg'))

<script>
    setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 3000);
</script>

<div class="alert alert-success alert-dismissible fade show" id="mydiv" role="alert">
    <strong>{{ session()->get('msg') }} ......!!</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif
