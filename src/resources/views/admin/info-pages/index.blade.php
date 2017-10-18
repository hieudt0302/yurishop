@extends('layouts.admin')
@section('title','Trang thông tin - Admin') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="pull-left">
        Danh sách Trang Thông Tin
    </h1>
      <div class="pull-right">
        <a href="{{('/admin/info-pages/create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
            Thêm mới
        </a>
      </div>
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
								<th>Tiêu đề</th>
								<th>Slug</th>								
                                <th></th>
                                <th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($info_pages as $info_page)
							<tr>
								<td>{{ $info_page->title }}</td>
								<td>{{ $info_page->slug }}</td>
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
								<th>Slug</th>									
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