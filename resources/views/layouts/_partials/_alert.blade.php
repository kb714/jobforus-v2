{{-- info alert --}}
@if(session('alert-info'))
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{session('alert-info')}}
    </div>
@endif
{{-- ./info alert --}}

{{-- success alert --}}
@if(session('alert-success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{session('alert-success')}}
    </div>
@endif
{{-- ./success alert --}}

{{-- warning alert --}}
@if(session('alert-warning'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{session('alert-warning')}}
    </div>
@endif
{{-- ./warning alert --}}

{{-- danger alert --}}
@if(session('alert-danger'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{session('alert-danger')}}
    </div>
@endif
{{-- ./danger alert --}}