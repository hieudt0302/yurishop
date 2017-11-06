@extends('layouts.admin')
@section('title','Gửi thông tin khuyến mãi - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Gửi mail khuyến mãi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Gửi mail khuyến mãi</li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
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
                @if ($message = Session::get('success_message'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('danger_message'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif   

                {!! Form::open(array('route' => ['admin.subscribes.send_mail'])) !!}
                    <table class="table table-responsive">            
                    	 <tr>
                            <td>Mẫu email</td>
                            <td>
                                <select name="mail_temp_id" class="form-control">
                                    @foreach($mailTemplates as $mail_temp)
                                    <option value="{{$mail_temp->id}}" {!! Setting::config('promote_mail')==$mail_temp->id ? 'selected' : '' !!}>
                                    	{{$mail_temp->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr> 
                    </table>                
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Gửi mail</button>
                    </div>
                {!! Form::close() !!}     
            </div>
        </div>
    </div>
</section>        
@endsection