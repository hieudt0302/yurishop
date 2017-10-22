

@extends('layouts.master')
@section('title','Poko Farms - FAQ')
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

<div class="aboutplantads">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="plantads-r">
                    <div class="panel-group" id="accordion">
                        @foreach ($faqs as $faq)
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h4 class="panel-title">
                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$faq->id}}">
                                 {{$faq->translation->question}}
                                 </a>
                              </h4>
                           </div><!--/.panel-heading -->
                           <div id="collapse-{{$faq->id}}" class="panel-collapse collapse">
                              <div class="panel-body">
                                 <p>{{$faq->translation->answer}}</p>
                              </div><!--/.panel-body -->
                           </div><!--/.panel-collapse -->
                        </div><!-- /.panel --> 
                        @endforeach                       
                    </div><!-- /.panel-group -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
