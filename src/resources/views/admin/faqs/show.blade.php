@extends('layouts.admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Chi tiết FAQ</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('admin.faqs.index') }}"> Trở Lại</a>
	        </div>
	    </div>
	</div>

	<div class="row">
        <ul class="nav nav-tabs" role="tablist" style="padding-left: 10px">
            @foreach ($language_list as $language)
            @if ($language->id == 1) 
            <li class="active">
            @else
            <li>
            @endif
                <a href="#{{$language->id}}-content" data-toggle="tab">Nội dung - {{$language->name}}</a>
            </li>
            @endforeach
        </ul>
        <div class="tab-content"> 
            @foreach ($faq_translations as $faqtran)
            @if ($faqtran->language_id == 1)       
            <div class="tab-pane active" id="{{$faqtran->language_id}}-content">
            @else
            <div class="tab-pane fade" id="{{$faqtran->language_id}}-content">
            @endif
                <b>Câu hỏi</b><br>
                {{ $faqtran->question }}
                <br><br>                
                <b>Trả lời</b><br>
                {{ $faqtran->answer }}
            </div>
            @endforeach  
        </div>            

	</div>
@endsection