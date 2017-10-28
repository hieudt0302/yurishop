@extends('layouts.admin')
@section('title','Cài đặt - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Cài đặt
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Cài đặt</li>
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

                {!! Form::open(array('route' => ['admin.settings.update'])) !!}
                    <ul class="nav nav-tabs" role="tablist" style="padding-left: 10px">
                        <li class="active">
                            <a href="#company" data-toggle="tab">Thông tin công ty</a>
                        </li> 
                        <li>
                            <a href="#website" data-toggle="tab">Cấu hình website</a>
                        </li>        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="company">
                            <table class="table table-responsive">            
	                            <tr>
	                                <td>
	                                    Tên công ty
	                                </td>
	                                <td>
	                                    <input type="text" class="form-control" name="website_name" value="{{ Setting::config('website_name') }}"/>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td>Địa chỉ</td>
	                                <td>
	                                    <input type="text" class="form-control" name="address" value="{{ Setting::config('address') }}"/>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td>Địện thoại</td>
	                                <td>
	                                    <input type="text" class="form-control" name="phone" value="{{ Setting::config('phone') }}"/>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td>Hotline</td>
	                                <td>
	                                    <input type="text" class="form-control" name="hotline" value="{{ Setting::config('hotline') }}"/>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td>Fax</td>
	                                <td>
	                                    <input type="text" class="form-control" name="fax" value="{{ Setting::config('fax') }}"/>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td>
	                                    Email
	                                </td>
	                                <td>
	                                    <input type="text" class="form-control" name="email" value="{{ Setting::config('email') }}"/>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td>Mã số thuế</td>
	                                <td>
	                                    <input type="text" class="form-control" name="tax_code" value="{{ Setting::config('tax_code') }}"/>
	                                </td>
	                            </tr>        
                            </table>                
                        </div>
                        <div class="tab-pane" id="website">
                            <table class="table table-responsive"> 
                            	 <tr>
	                                <td>Tiêu đề website (SEO)</td>
	                                <td>
	                                    <input type="text" class="form-control" name="seo_title" value="{{ Setting::config('seo_title') }}" />
	                                </td>
	                            </tr>
	                            <tr>
	                                <td>Từ khóa (SEO)</td>
	                                <td>
	                                    <input type="text" class="form-control" name="keyword" value="{{ Setting::config('keyword') }}" />
	                                </td>
	                            </tr>
	                            <tr>
	                                <td>Mô tả (SEO)</td>
	                                <td>
	                                    <textarea class="form-control" name="description" style="height: 100px">{{ Setting::config('description') }}</textarea>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td>Logo</td>
	                                <td>
	                                    <input type="file" class="form-control" name="logo" />
	                                </td>
	                                <td>
	                                    @if(Setting::config('logo') != '' )
	                                    <img src="{{asset('/images/logo')}}/Setting::config('logo')" />
	                                    @endif
	                                </td>
	                            </tr>
	                            <tr>
	                                <td>Favicon</td>
	                                <td>
	                                    <input type="file" class="form-control" name="favicon" />
	                                </td>
	                                <td>
	                                    @if(Setting::config('favicon') != '' )
	                                    <img src="{{asset('/images/logo')}}/Setting::config('favicon')" />
	                                    @endif
	                                </td>
	                            </tr>   
	                            <tr>
	                                <td>Mẫu mail kích hoạt tài khoản</td>
	                                <td>
		                                <select name="account_active_mail" class="form-control">
	                                        @foreach($mail_temps as  $mail_temp)
	                                        <option value="{{$mail_temp->id}}" {!! Setting::config('account_active_mail')==$mail_temp->id ? 'selected' : '' !!}>
	                                        	{{$mail_temp->name}}
	                                        </option>
	                                        @endforeach
	                                    </select>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td>Mẫu mail thông báo khuyến mãi</td>
	                                <td>
		                                <select name="promote_mail" class="form-control">
	                                        @foreach($mail_temps as $mail_temp)
	                                        <option value="{{$mail_temp->id}}" {!! Setting::config('promote_mail')==$mail_temp->id ? 'selected' : '' !!}>
	                                        	{{$mail_temp->name}}
	                                        </option>
	                                        @endforeach
	                                    </select>
	                                </td>
	                            </tr>         
                            </table>  
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Lưu thay đổi</button>
                    </div>
                </form>        
            </div>
        </div>
    </div>
</section>        
@endsection