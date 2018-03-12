@extends('layouts.admin_default')


@section('title')
{{ getSetting('site_shortname') }} | Dashboard
@stop



@section('script')
 
@stop


@section('content') 
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Welcome To Admin Pannel.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection