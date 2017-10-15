@extends('layouts.admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Chi tiết Trang thông tin</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('admin.info-pages.index') }}"> Quay lại danh sách trang thông tin</a>
	        </div>
	    </div>
	</div>

	<div class="row">              
        <ul class="nav nav-tabs" role="tablist" style="padding-left: 10px">
            <li class="active">
                <a href="#general" data-toggle="tab">Thông tin chung</a>
            </li>              
            @foreach ($language_list as $language)
            <li>
                <a href="#{{$language->id}}-content" data-toggle="tab">Nội dung - {{$language->name}}</a>
            </li>
            @endforeach
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="general">

                            <b>Tiêu đề</b><br>

                            {{ $info_page->title }}<br><br>

                            <b>Slug</b><br>

                            {{ $info_page->slug }}
              
            </div>         
            @foreach ($info_page_translations as $info_page_tran)
            <div class="tab-pane fade" id="{{$info_page_tran->language_id}}-content">
                <b>Tiêu đề hiển thị</b><br>
                {{ $info_page_tran->title }}
                <br><br>                 
                <b>Nội dung</b><br>
                {{ $info_page_tran->content }}
            </div>
            @endforeach  
        </div>            

	</div>
@endsection