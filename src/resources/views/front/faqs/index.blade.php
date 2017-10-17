

@extends('layouts.master')
@section('title','Dakmark Foods - FAQ')
@section('header')
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">   
@endsection
@section('content')
<!-- Head Section -->
<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>@lang('common.faq')</h1>
            </div>
        </div>
    </div>
</div>

<section class="bloglistpost-v1 bloglistpost-v2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="container">
                    @foreach ($faqs as $faq)
                        <div class="panel-group" id="accordion">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$faq->id}}">
                                {{$faq->translation->question}}</a>
                              </h4>
                            </div>
                            <div id="collapse-{{$faq->id}}" class="panel-collapse collapse">
                              <div class="panel-body">{{$faq->translation->answer}}</div>
                            </div>
                          </div>
                        </div>  
                    @endforeach
                </div>  
            </div>            
        </div>
    </div>
</section>
@endsection
