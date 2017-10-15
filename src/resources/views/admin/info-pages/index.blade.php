@extends('layouts.admin')
@section('title','Trang thông tin - Admin') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Menu
        <small>Danh Sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Menu</a></li>
        <li class="active">Danh Sách</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh Sách Trang Thông Tin</h3>
                </div>
				@if ($message = Session::get('success'))
					<div class="alert alert-success">
						<p>{{ $message }}</p>
					</div>
				@endif 
                <div class="box-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Tiêu đề</th>
                                <th></th>
                                <th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($info_pages as $info_page)
							<tr>
								<td>{{ $info_page->title }}</td>
								<td>
									<a class="btn btn-primary btn-sm" href="{{ route('admin.info-pages.edit',$info_page->id) }}"><i class="fa fa-edit"></i></a> 
								</td>
								<td>
	                             	{!! Form::open(['method' => 'DELETE','route' => ['admin.info-pages.destroy', $info_page->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit','class' => 'btn btn-warning btn-sm'] )  }}
                                    {!! Form::close() !!}   
								</td>	
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Tiêu đề</th>
                                <th></th>
                                <th></th>
							</tr>							
						</tfoot>	
					</table>
					{!! $info_pages->render() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection