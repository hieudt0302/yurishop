@extends('layouts.admin') 
@section('title','Chủ Đề Bài Viết - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Chủ Đề Bài Viết
        <small>Danh Sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Chủ Đề Bài Viết/a></li>
        <li class="active">Danh Sách</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="form-horizontal">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="label-wrapper"><label class="control-label" for="SearchCategoryName" title="">Category name</label>
                                        <div class="ico-help" title="A category name."><i class="fa fa-question-circle"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input class="form-control text-box single-line" id="SearchCategoryName" name="SearchCategoryName" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="label-wrapper"><label class="control-label" for="SearchStoreId" title="">Parent</label>
                                        <div class="ico-help" title="Search by a specific store."><i class="fa fa-question-circle"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control"  id="search_sub_of_parent" name="search_sub_of_parent">
                                        <option selected="selected" value="0">None</option>
                                        <option value="1">Cà Phê 1</option>
                                        <<option value="1">Cà Phê 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="button" id="search-categories" class="btn btn-primary btn-search"><i class="fa fa-search"></i>Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="categories-grid" >
                        <table class="table table-bordered">
                            <thead class="" >
                                <tr >
                                    <th>Name</th>
                                    <th  style="text-align:center" >Enabled</th>
                                    <th  style="text-align:center" >Visible</th>
                                    <th  style="text-align:center" >Menu</th>
                                    <th>Display order</th>
                                    <th  style="text-align:center" >Edit</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->translation->name}}</td>
                                    <td style="text-align:center">
                                        @if($category->enabled)
                                        <i class="fa fa-check true-icon"></i>
                                        @else 
                                        <i class="fa fa-check false-icon"></i>
                                        @endif
                                    </td>
                                    <td style="text-align:center">
                                        @if($category->is_visible)
                                        <i class="fa fa-check true-icon"></i>
                                        @else 
                                        <i class="fa fa-check false-icon"></i>
                                        @endif
                                    </td>
                                    <td style="text-align:center">
                                        @if($category->is_menu_avaiable)
                                        <i class="fa fa-check true-icon"></i>
                                        @else 
                                        <i class="fa fa-check false-icon"></i>
                                        @endif
                                    </td>
                                    <td>{{$category->order}}</td>
                                    <td style="text-align:center">
                                        <a class="btn btn-default" href="{{url('/admin/categories')}}/{{$category->id}}/edit"><i class="fa fa-pencil"></i>Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 
@section('scripts') 
@endsection