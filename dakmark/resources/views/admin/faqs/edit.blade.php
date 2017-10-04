@extends('layouts.admin')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Chỉnh sửa FAQ</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('admin.faqs.index') }}"> Quay lại danh sách FAQ</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Lỗi!</strong> Kiểm tra lại thông tin đã nhập.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

{!! Form::open(array('method' => 'PATCH','route' => ['admin.faqs.update', $faq->id])) !!}
    <ul class="nav nav-tabs" role="tablist" style="padding-left: 10px">
        @foreach ($language_list as $language)
        <li>
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
            <input type="hidden" id="faq-translation-id" name="{{$faqtran->language_id}}-id" value="{{ $faqtran->id }}" />
            <table class="table table-responsive">
                <tr>
                    <td>
                        Câu hỏi
                        <span class="text-danger">*</span>
                    </td>
                    <td>
                        <input type="text" id="title" class="form-control" name="{{$faqtran->language_id}}-question" value="{{ $faqtran->question }}" />
                    </td>
                </tr>
                <tr>
                    <td>Trả lời</td>
                    <span class="text-danger">*</span>                    
                    <td>
                        <textarea class="form-control" name="{{$faqtran->language_id}}-answer">{{ $faqtran->answer }}</textarea>
                    </td>
                </tr> 
            </table>
        </div>
        @endforeach
    </div>
    <div style=" text-align: center">
        <button type="submit" class="btn btn-info">Lưu thay đổi</button>
    </div>
</form>    
@endsection