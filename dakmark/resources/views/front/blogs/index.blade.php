@extends('layouts.master')
@section('content')
    <div class="columns-container">
        <div class="container" id="columns">
            <!-- row -->
            <div class="row">
                <!-- Center colunm-->
                <div class="center_column col-xs-12 col-sm-9" id="center_column">
                    <h2 class="page-heading">
                        <span class="page-heading-title2">Danh sách bản tin</span>
                    </h2>
                    <ul class="blog-posts">
                     @foreach($blogs as $row)
                        <li class="post-item">
                            <article class="entry">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="entry-thumb image-hover2">

                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="entry-ci">
                                            <h3 class="entry-title"><a href="{{url('/blogs/'.$row->id)}}">{{$row->title}}</a></h3>
                                            <div class="entry-meta-data">
                                                <span class="comment-count">
                                                    <i class="fa fa-comment-o"></i> 3
                                                </span>
                                                <span class="date"><i class="fa fa-calendar"></i> 2014-08-05 07:01:49</span>
                                            </div>
                                            <div class="entry-excerpt">
                                                Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                    </ul>
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </div>
@endsection