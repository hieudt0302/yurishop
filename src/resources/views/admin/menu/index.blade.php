@extends('layouts.admin')
@section('title','Menu - Admin')
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
        <div class="col-md-12">
            <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Menu Chính</h3>
              <div class="box-tools pull-right">
                <!-- <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <ol class="todo-list sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded">
                @foreach($menus as $menu)
                <li class="mjs-nestedSortable-leaf" id="menuItem_{{$menu->id}}">
                  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <span class="text">{{$menu->name}}</span>
                  <input type="checkbox" value="">Enabled
                  <input type="checkbox" value="">Visible
                  <input type="checkbox" value="">Set Menu
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                @endforeach                
              </ol> -->
              <ol class="sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded">
              @foreach($menus as $menu)
                <li class="mjs-nestedSortable-leaf" id="menuItem_{{$menu->id}}">
                    <div class="menuDiv">
                        <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
                        <span></span>
                                </span>
                                <span title="Click to show/hide item editor" data-id="{{$menu->id}}" class="expandEditor ui-icon ui-icon-triangle-1-n">
                        <span></span>
                                </span>
                                <span>
                        <span data-id="{{$menu->id}}" class="itemTitle">{{$menu->name}}</span>
                                <span title="Click to delete item." data-id="{{$menu->id}}" class="deleteMenu ui-icon ui-icon-closethick">
                        <span></span>
                        </span>
                        </span>
                        <div id="menuEdit{{$menu->id}}" class="menuEdit hidden">
                            <p>
                            {{$menu->description}}
                            </p>
                        </div>
                    </div>
                    <ol>
                      @foreach($menu->GetMenuSubLevel1() as $sub)
                      <li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_{{$sub->id}}" data-foo="baz">
                        <div class="menuDiv">
                          <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
                          <span></span>
                          </span>
                          <span title="Click to show/hide item editor" data-id="{{$sub->id}}" class="expandEditor ui-icon ui-icon-triangle-1-n">
                          <span></span>
                          </span>
                          <span>
                          <span data-id="{{$sub->id}}" class="itemTitle">{{$sub->name}}</span>
                          <span title="Click to delete item." data-id="{{$sub->id}}" class="deleteMenu ui-icon ui-icon-closethick">
                          <span></span>
                          </span>
                          </span>
                          <div id="menuEdit{{$sub->id}}" class="menuEdit hidden">
                            <p>
                            {{$sub->description}}
                            </p>
                          </div>
                        </div>
                      </li>
                      @endforeach
                    </ol>
                </li>
                @endforeach     
               </ol>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
          </div>
          <!-- /.box -->
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{asset('adminlte/dist/js/jquery.mjs.nestedSortable.js')}}"></script>
<script>
    $(function() {
        'use strict';
        // jQuery UI sortable for the todo list
        // $('.todo-list').sortable({
        //   placeholder         : 'sort-highlight',
        //   handle              : '.handle',
        //   forcePlaceholderSize: true,
        //   zIndex              : 999999
        // });
        /* jQueryKnob */
        // $('.knob').knob();
        /* The todo list plugin */
        // $('.todo-list').todoList({
        //         onCheck  : function () {
        //         window.console.log($(this), 'The element has been checked');
        //     },
        //         onUnCheck: function () {
        //         window.console.log($(this), 'The element has been unchecked');
        //     }
        // });

        $('.sortable').nestedSortable({
          handle: 'div',
          items: 'li',
          toleranceElement: '> div'
        });
        $('.expandEditor').attr('title','Click to show/hide item editor');
			$('.disclose').attr('title','Click to show/hide children');
			$('.deleteMenu').attr('title', 'Click to delete item.');
		
			$('.disclose').on('click', function() {
				$(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
				$(this).toggleClass('ui-icon-plusthick').toggleClass('ui-icon-minusthick');
			});
			
			$('.expandEditor, .itemTitle').click(function(){
				var id = $(this).attr('data-id');
				$('#menuEdit'+id).toggle();
				$(this).toggleClass('ui-icon-triangle-1-n').toggleClass('ui-icon-triangle-1-s');
			});
			
			$('.deleteMenu').click(function(){
				var id = $(this).attr('data-id');
				$('#menuItem_'+id).remove();
			});
    });
</script>
@endsection