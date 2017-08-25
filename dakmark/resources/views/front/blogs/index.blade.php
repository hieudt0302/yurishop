@extends('layouts.master')
@section('content')
    <div class="columns-container">
        <div class="container" id="columns">
            <!-- row -->
            <div class="row">
                <!-- Center colunm-->
                <div class="center_column col-xs-12 col-sm-9" id="center_column">
                    <nav class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Tin tức</a>
                        </div>
                        <div id="search" class="navbar navbar-right">
                          <form action="{{url('/admin/blogs/search')}}" method="POST" accept-charset="utf-8">
                            <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                            <input type="text" name="key" placeholder="Tìm tin tức..." style="min-width: 250px;" class="rounded" />
                          </form>
                        </div>
                    </nav>
                    <ul class="blog-posts">
                     @foreach($blogs as $row)
                        <div class="row panel panel-default py-3">
                            <div class="col-md-7">
                                <a href="{{url('/blogs/'.$row->id)}}">
                                    <img class="img-thumbnail" src="{{url('public/uploads/blogs/'.$row->img)}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-5">
                                <h3>{{$row->title}}</h3>
                                <span class="date"><i class="fa fa-calendar"></i> {{$row->updated_at}}</span>
                                <p>{!!$row->content!!}</p>
                                <a class="btn btn-primary" href="{{url('/blogs/'.$row->id)}}">Xem Bài <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                        </div>
                        </br>
                    @endforeach
                    </ul>
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </div>
@endsection