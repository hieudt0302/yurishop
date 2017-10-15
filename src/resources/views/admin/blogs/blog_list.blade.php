
@extends('layouts.admin')
@section('title', 'Blog')
@section('description', 'Blog')
@section('content')
<header class="header">
    <a href="{{ route('admin.blog.add') }}" class="btn btn-primary btn-add" title="Thêm blog mới">
        <i class="fa fa-plus"></i>
        Thêm blog mới
    </a>
</header>
<div class="container blog-list">
    <div class="row">
        @include('notifications.status_message') 
        @include('notifications.errors_message')
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif
        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif
        <div class="col-md-12" class="search-box">
            {!! Form::open(array('route' => 'admin.blog.search')) !!}
                <div class="col-md-5">
                    <span class="search-label">Tiêu đề</span>
                    <input type="text" name="title" class="form-control search-input" placeholder="Nhập tiêu đề bài viết">
                </div>
                <div class="col-md-7">
                    <span class="search-label">Danh mục</span>
                    <select name="cat_id" class="form-control search-select">
                        <option value="0" selected >Tất cả</option>
                        @foreach ($blogCats as $bCat)
                        <option value="{{ $bCat->id }}">{{ $bCat->name }}</option>
                            @if(App\Models\BlogCat::hasChildCat($bCat->id))
                                @foreach(App\Models\BlogCat::getChildCat($bCat->id) as $childCat)
                            <option value="{{ $childCat->id }}">---{{ $childCat->name }}</option>
                                    @if(App\Models\BlogCat::hasChildCat($childCat->id))
                                        @foreach(App\Models\BlogCat::getChildCat($childCat->id) as $childCat2)
                                <option value="{{ $childCat2->id }}">---{{ $childCat2->name }}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary search-btn">Tìm kiếm</button>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-12">
            <table id="order-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình đại diện</th>
                        <th>Tiêu đề</th>
                        <th>Hiển thị</th>
                        <th>Lượt xem</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach ($blogs as $b)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td style="width:10%">
                            <img class="img-thumb" src="{{ asset('public/assets/img/blog/' . $b->thumb) }}" />
                        </td>
                        <td>{{ $b->title }}</td>
                        <td>
                            <i class="fa {!! ($b->is_show==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>{{ $b->views }}</td>
                        <td>
                            <a href="{{ route('admin.blog.edit',$b->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                <i class="fa fa-pencil"></i>Sửa 
                            </a>
                            <?php $blogCat = App\Models\BlogCat::find($b->cat_id); ?>
                            @if($blogCat->system_id != 'INFOCAT')
                            <a href="{{ route('admin.blog.delete',$b->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                                onclick="return confirm('Bạn muốn xóa blog này ?');">
                                <i class="fa fa-trash"></i>Xóa
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>        
            </table>
        </div>
    </div>
</div>

@endsection


