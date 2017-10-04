@extends('layouts.admin')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Thêm mới FAQ</h2>
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

{!! Form::open(array('method' => 'POST','route' => ['admin.faqs.store'])) !!}
    <ul class="nav nav-tabs" role="tablist" style="padding-left: 10px">
        @foreach ($language_list as $language)
        <li>
            <a href="#{{$language->id}}-content" data-toggle="tab">Nội dung - {{$language->name}}</a>
        </li>
        @endforeach
    </ul>
    <div class="tab-content">
        @foreach ($language_list as $language)
        @if ($language->id == 1)   
        <div class="tab-pane active" id="{{$language->id}}-content">
        @else
        <div class="tab-pane fade" id="{{$language->id}}-content">
        @endif
            <table class="table table-responsive">
                <tr>
                    <td>
                        Câu hỏi
                        <span class="text-danger">*</span>
                    </td>
                    <td>
                        <input type="text" id="title" class="form-control" name="{{$language->id}}-question" placeholder="Nhập nội dung" />
                    </td>
                </tr>
                <tr>
                    <td>Trả lời</td>
                    <span class="text-danger">*</span>                    
                    <td>
                        <textarea class="form-control" name="{{$language->id}}-answer" placeholder="Nhập nội dung"></textarea>
                    </td>
                </tr> 
            </table>
        </div>
        @endforeach
    </div>
    <div style=" text-align: center">
        <button type="submit" class="btn btn-info">Thêm mới</button>
    </div>
</form>    
@endsection