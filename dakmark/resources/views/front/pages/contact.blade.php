

@extends('layouts.master')
@section('title','Đặt hàng')
@section('content')
<section class="contact">
	<div class="container">
		<div class="row contact-box">
        	<div class="col-sm-5 info-box">
				<div class="contact-title">@lang('contact.headquarter')</div>
				<ul class="info-list">
            		<li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>  
                        Địa chỉ Công ty
                    </li>
    				<li>
                        <i class="fa fa-phone-square" aria-hidden="true"></i>
                        ĐT Công ty
                    </li>
    				<li>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        Email Công ty            
                    </li>
    				<li>
                        <i class="fa fa-fax" aria-hidden="true"></i>    
                        Fax Công ty        
                    </li>
				</ul>
			</div>
            <div class="col-sm-7 form-box">
                <div class="contact-title">@lang('contact.review')</div>
				{!! Form::open(array('route' => 'front.send-contact')) !!}
  					<div class="form-group row">
    					<label class="col-md-2 label-md">@lang('contact.name')</label>
    					<div class="col-md-10">
                        	<input type="text" name="name" class="form-control">
                        </div>
  					</div>
  					<div class="form-group row">
    					<label class="col-md-2 label-md">@lang('contact.email') *</label>
    					<div class="col-md-10">
                        	<input type="email" name="email" class="form-control">
                        </div>
  					</div>
  					<div class="form-group row">
    					<label class="col-md-2 label-md">@lang('contact.phone')</label>
    					<div class="col-md-10">
                        	<input type="text" name="phone" class="form-control">
                        </div>
  					</div>
  					<div class="form-group row">
    					<label class="col-md-2 label-md">@lang('contact.content') *</label>
							<div class="col-md-10">
                        	<textarea name="message" class="form-control"></textarea>
                        </div>
  					</div>
  					<button type="submit" class="btn btn-primary">@lang('contact.send')</button>
				{!! Form::close() !!}
            </div>	
     	</div>
	</div>
</section>

@endsection
