@extends('layouts.default')


@section('title')
AdminLTE 2 | Dashboard
@stop



@section('script')
 <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
@stop


@section('content') 
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Welcome To Front Pannel.

                     <?php
                      use App\Model\Slider;
                      $sliders = Slider::Where('group_id',1)->orderBy('order')->get();


                     ?>

                    <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
                          <ol class="carousel-indicators">
                            @foreach($sliders as $key => $slider)
                               @if($key == 0)
                                  <li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>
                               @else 
                                  <li data-target="#myCarousel" data-slide-to="{{$key}}"></li>
                               @endif
                            @endforeach
                          </ol>
                          <div class="carousel-inner">
                            @foreach($sliders as $key => $slider)

                               @if($key == 0)
                                  <div class="item active"> 
                                      <img src="{{url('public/uploads/sliders/'.$slider->image)}}" style="width:100%" data-src="" alt="{{$slider->title}}">
                                      <div class="container">
                                        <div class="carousel-caption">
                                          <h1>{{$slider->title}}</h1>
                                          @if($slider->description)<p>{{$slider->description}}</p>@endif
                                          @if($slider->url)<p><p><a class="btn btn-lg btn-primary" href="{{$slider->url}}" role="button">Click Here</a></p></p>@endif  
                                        </div>
                                      </div>
                                    </div>
                               @else     
                                    <div class="item"> 
                                      <img src="{{url('public/uploads/sliders/'.$slider->image)}}" style="width:100%" data-src="" alt="{{$slider->title}}">
                                      <div class="container">
                                        <div class="carousel-caption">
                                          <h1>{{$slider->title}}</h1>
                                          @if($slider->description)<p>{{$slider->description}}</p>@endif
                                          @if($slider->url)<p><p><a class="btn btn-lg btn-primary" href="{{$slider->url}}" role="button">Click Here</a></p></p>@endif  
                                        </div>
                                      </div>
                                    </div>    
                               @endif

                            @endforeach

                          </div>
                          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                          </a> 
                          <a class="right carousel-control" href="#myCarousel" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                          </a> 
                    </div>
  
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection