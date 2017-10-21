@extends('layouts.admin')
@section('title','Mail Template - Admin') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh sách Mail Template
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Mail Template</a></li>
        <li class="active">Danh sách</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
				@if ($message = Session::get('success'))
					<div class="alert alert-success">
						<p>{{ $message }}</p>
					</div>
				@endif 

                <div class="box-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Tên</th>
								<th></th>
								<th></th>													
							</tr>
						</thead>
						<tbody>
							@foreach ($mailTemplates as $mailTemplate)
							<tr>
								<td>{{ $mailTemplate->name }}</td>
								<td>
									<a class="btn btn-primary btn-sm" href="{{ route('admin.mail_templates.edit',$mailTemplate->id) }}"><i class="fa fa-edit"></i></a> 
								</td>
								<td>
	                             	{!! Form::open(['method' => 'DELETE','route' => ['admin.mail_templates.destroy', $mailTemplate->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit','class' => 'btn btn-warning btn-sm'] )  }}
                                    {!! Form::close() !!}   
								</td>	
							</tr>
							@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection