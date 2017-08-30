@extends('layouts.master')
@section('content')
    <div class="columns-container" style="padding-top:100px;">
        <div class="container" id="columns">
            <!-- row -->
            <div class="row">
                <!-- Center colunm-->
                <div class="panel panel-default" id="center_column">
                    <div class="widget-title">
                        <div id="search" class="float-right">
                          <form action="{{url('/blogs/search')}}" method="POST" accept-charset="utf-8">
                            <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                            <input type="text" name="key" placeholder="{{ trans('blog.searchbox-placeholder') }}" style="min-width: 250px;" class="form-control form-rounded" style="width:200px;" />
                          </form>
                        </div>
                    </div>
                    </br>
                    @if($type !='search')
                        <div class="pagination alternate pull-right" style="margin-top: -10px; margin-bottom: 5px; margin-right: 10px;">
                          {{$blogs->render()}}
                        </div>
                    @endif
                    @if($type =='search')
                        <h4 style="padding-left: 15px"> kết quả tìm kiếm 20 bản tin hàng đầu với từ khóa : <span style="color: red; font-weight: bold;"> {{$key}}</span> </h4>
                    @endif
                    <ul class="blog-posts">
                     @foreach($blogs as $row)
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{url('/blogs/'.$row->id)}}">
                                    <img class="img-thumbnail" src="{{url('public/uploads/blogs/'.$row->img)}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-9">
                                <h3>{{$row->title}}</h3>{{$loc}}
                                <span class="date"><i class="fa fa-calendar"></i> {{$row->updated_at}}</span>
                                <p>{!!$row->intro!!}</p>
                                <a class="btn btn-primary float-right" href="{{url('/blogs/'.$row->id)}}">{{ trans('blog.read-more') }} <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    </ul>
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </div>
@endsection