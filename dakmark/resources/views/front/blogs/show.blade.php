@extends('layouts.master')
@section('content')
    <div class="columns-container">
        <div class="container" id="columns">
            <!-- row -->
            <div class="row">
                <!-- Center colunm-->
                <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <article class="entry-detail col-md-12">
                    <div class="entry-photo">
                        
                    </div>
                    <h3>{!!$blog->title!!}</h3>
                    <div class="content-text clearfix">
                        <p>{!!$blog->intro!!}</p>
                        <p>{!!$blog->content!!}</p>
                    </div>
                </article>
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </div>
@endsection