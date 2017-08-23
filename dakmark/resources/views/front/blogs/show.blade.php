@extends('layouts.master')
@section('content')
    <div class="columns-container">
        <div class="container" id="columns">
            <!-- row -->
            <div class="row">
                <!-- Center colunm-->
                <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <article class="entry-detail">
                    <div class="entry-photo">
                        
                    </div>
                    {!!$blog->title!!}
                    <div class="content-text clearfix">
                        {!!$blog->content!!}
                    </div>
                </article>
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </div>
@endsection