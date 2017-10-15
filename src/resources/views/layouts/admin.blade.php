<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
     
    <meta name="description" content="@yield('description')">

    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('backend/dist/bootstrap-3.3.7/css/bootstrap.min.css')}}"> 

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/dist/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('backend/dist/ionicons-2.0.1/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('backend/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('backend/css/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('backend/css/jquery-jvectormap-2.0.3.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('backend/dist/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
  
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="{{asset('adminlte/css/daterangepicker.css')}}"> -->
  <!-- bootstrap wysihtml5 - text editor -->
  <!-- <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}"> -->
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('backend/dist/select2/css/select2.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700&amp;subset=cyrillic,vietnamese" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('backend/dist/jquery-ui-1.12.1/jquery-ui.min.css')}}">
   
 <style>
.tools {
     float: right; 
     color: #dd4b39;
}
/* sortable */
ol {
			max-width: 450px;
			padding-left: 25px;
		}
		
		ol.sortable,ol.sortable ol {
			list-style-type: none;
		}
		
		.sortable li div {
			border: 1px solid #d4d4d4;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			cursor: move;
			border-color: #D4D4D4 #D4D4D4 #BCBCBC;
			margin: 0;
			padding: 3px;
		}
		
		li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
			border-color: #999;
		}
		
		.disclose, .expandEditor {
			cursor: pointer;
			width: 20px;
			display: none;
		}
		
		.sortable li.mjs-nestedSortable-collapsed > ol {
			display: none;
		}
		
		.sortable li.mjs-nestedSortable-branch > div > .disclose {
			display: inline-block;
		}
		
		.sortable span.ui-icon {
			display: inline-block;
			margin: 0;
			padding: 0;
		}
		
		.menuDiv {
			background: #EBEBEB;
		}
		
		.menuEdit {
			background: #FFF;
		}
		
		.itemTitle {
			vertical-align: middle;
			cursor: pointer;
		}
		
		.deleteMenu {
			float: right;
			cursor: pointer;
    }
    
    p,ol,ul,pre,form {
			margin-top: 0;
			margin-bottom: 1em;
    }
    ul,ol{margin-bottom:0;}.margin-r-10{margin-right:10px;}.margin-l-10{margin-left:10px;}.margin-l-5{margin-left:5px;}.margin-t-5{margin-top:5px;}.please-wait{background:url('images/ajax_loader_small.gif') no-repeat;padding-left:20px;}.alert{margin-bottom:0;border-radius:0 0 3px 3px;}.alert-success{border-color:#02A91E;}.callout.callout-success,.alert-success,.label-success,.modal-success .modal-body{background-color:#17b76d!important;}.field-validation-error,.validation-summary-errors{color:red;}.field-validation-valid.warning{color:#fff;background-color:#f39c12;margin:5px 0;display:block;padding:5px;border-radius:3px;border-left:5px solid #c87f0a;}ul.common-list{list-style:none;padding-left:0;margin-bottom:15px;}.fa.true-icon{color:#007FCC;font-size:20px;}.fa.false-icon{color:#D22D2D;font-size:20px;}.new-item-notification{width:25px;height:25px;background-image:-webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:-o-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);background-image:linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);-webkit-background-size:40px 40px;background-size:40px 40px;background-color:#dd4b39;display:inline-block;color:#fff;border-radius:15px;line-height:24px;text-align:center;-webkit-animation:progress-bar-stripes 2s linear infinite;-o-animation:progress-bar-stripes 2s linear infinite;animation:progress-bar-stripes 2s linear infinite;margin-left:10px;}.new-item-notification span{font-size:15px;}.info-box{min-height:106px;}.info-box-icon{min-height:106px;}.btn-back-top{display:none;right:40px;bottom:40px;position:fixed;width:61px;height:48px;}.btn-back-top::before{content:"";display:block;position:relative;left:7px;top:12px;width:22px;height:22px;border-right:6px solid white;border-top:6px solid white;-webkit-transform:rotate(-45deg);-moz-transform:rotate(-45deg);-ms-transform:rotate(-45deg);-o-transform:rotate(-45deg);transform:rotate(-45deg);-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-ms-transition:all 0.2s;-o-transition:all 0.2s;transition:all 0.2s;}.dropdown-menu button{border:none;padding:3px 20px;text-align:left;}.dropdown-menu li:hover{background:rgba(0,0,0,0.1);}.dropdown-menu li:hover button{background-color:transparent!important;}.scroll-wrapper{overflow-x:scroll;}.requirement-container{margin-bottom:5px;margin-top:5px;border:1px dashed #8c949a;display:table;}.requirement-container.requirement-group{border:none;border-left:2px solid #8c949a;}.requirement-container .requirement-heading{padding:7px 10px 3px 10px;line-height:24px;}.requirement-container.requirement-group>.requirement-heading{height:30px;line-height:30px;display:table;background:#eeeeee;padding:0px 2px 0px 10px;}.requirement-container .requirement-heading .btn-link{padding:0 3px;margin-left:50px;font-size:15px;color:#367fa9;float:right;text-decoration:none;}.requirement-container.requirement-group>.requirement-heading .btn-link{padding:3px 10px 3px 0px;}.requirement-container .requirement-body{padding:10px 20px 8px 10px;min-height:35px;}.requirement-container.requirement-group>.requirement-body{padding:10px 0 5px 20px;}.requirement-container .requirement-product-names.filled{clear:both;max-width:600px;padding-top:5px;}.requirement-data-buttons{margin-top:5px;}.requirement-container .requirement-data-buttons{margin-top:0;float:left;}.requirement-container .requirement-data-input{float:left;margin-right:5px;}.requirement-container .requirement-label-col{width:auto;}.requirement-container .requirement-data-col{width:auto;}.requirement-container .requirement-data-buttons button{margin-top:0;}.requirement-container .requirement-messages-col{margin-left:0;}.interaction-type select{width:70px;height:26px;line-height:25px;font-size:12px;margin-top:2px;}.panel-add-requirement{margin-top:20px;}.modal-content{text-align:left;}.modal-body{font-size:14px;}.fa{padding-right:5px!important;}table.adminContent{border-collapse:collapse;color:#333;font-size:14px;margin:0;width:100%;vertical-align:middle;text-align:left;}.k-button{display:inline-block;padding:6px 12px;margin-bottom:0;font-size:14px;font-weight:400;line-height:1.42857143;text-align:center;white-space:nowrap;vertical-align:middle;-ms-touch-action:manipulation;touch-action:manipulation;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-image:none;border:1px solid transparent;border-radius:4px;background-color:#f4f4f4;color:#444;border-color:#ddd;}.k-multiselect .k-button{white-space:normal;}.k-button:hover,.k-button:focus,.k-button.k-state-focused{background-color:#e7e7e7;background-image:none;color:#333;border-color:#adadad;text-decoration:none;}.k-button:active{color:#333;background-color:#e7e7e7;border-color:#adadad;}.k-button:focus:active:not(.k-state-disabled):not([disabled]){box-shadow:none;-webkit-box-shadow:none;}.k-grid .k-button,.k-grid tbody td>.k-grid-delete,table .btn{margin:2px;}.k-picker-wrap.k-state-default,.k-numeric-wrap.k-state-default{border-radius:0;border:none;height:34px;padding-right:23px;background:#fff;}.k-picker-wrap.k-state-hover{background:#fff;}.k-picker-wrap .k-select,.k-numeric-wrap .k-select{border-radius:0;border:none;}.k-numeric-wrap.k-state-default>.k-select{background-color:#fff;border:none;height:34px;width:22px;opacity:1;}.k-picker-wrap.k-state-default>.k-select{background:#fff;border:1px solid #d2d6de;height:32px;width:4.5em;padding-left:1px;-moz-box-sizing:content-box;}.k-picker-wrap.k-state-hover>.k-select{border-color:#afafaf;}.k-picker-wrap .k-input,.k-numeric-wrap .k-input{height:26px;border-radius:0;border:1px solid #d2d6de;text-indent:0.7em;color:#555;padding:3px 0;}.k-picker-wrap.k-state-focused.k-state-selected,.k-numeric-wrap.k-state-focused.k-state-selected,td.k-state-focused.k-state-selected{-webkit-box-shadow:inset 0 0 3px 4px #5FA6D2;box-shadow:inset 0 0 3px 4px #5FA6D2;}.k-state-active,.k-state-active:hover,.k-active-filter,.k-tabstrip .k-state-active{border-color:#c5c5c5!important;}.k-state-selected,.k-state-selected:link,.k-state-selected:visited,.k-list>.k-state-selected,.k-list>.k-state-highlight,.k-panel>.k-state-selected,.k-ghost-splitbar-vertical,.k-ghost-splitbar-horizontal,.k-draghandle.k-state-selected:hover,.k-scheduler .k-scheduler-toolbar .k-state-selected,.k-scheduler .k-today.k-state-selected,.k-marquee-color{background-color:#3c8dbc;border-color:#3c8dbc;}.k-picker-wrap.k-state-focused,.k-numeric-wrap.k-state-focused{border-color:#00c0ef;box-shadow:none;padding-bottom:0;}.k-numerictextbox .k-link{height:16px;border:1px solid #d2d6de;border-radius:0;}.k-numerictextbox .k-link:hover{border-color:#afafaf;}.k-numerictextbox .k-link:hover+.k-link{border-top-color:#afafaf;}.k-numeric-wrap .k-link+.k-link{margin-top:-1px;height:15px;border-radius:0;}.k-numeric-wrap.k-state-disabled,.k-picker-wrap.k-state-disabled{border-radius:0;border:none;opacity:1;height:34px;}.k-numeric-wrap.k-state-disabled .k-input,.k-picker-wrap.k-state-disabled .k-input{background-color:#eee;cursor:not-allowed;}.k-numerictextbox .k-link.k-state-selected{-webkit-box-shadow:inset 0 3px 5px rgba(0,0,0,0.125);-moz-box-shadow:inset 0 3px 5px rgba(0,0,0,0.125);box-shadow:inset 0 3px 5px rgba(0,0,0,0.125);background:#fff;}.k-numerictextbox .k-i-arrow-n,.k-numerictextbox .k-i-arrow-s{position:absolute;left:0px;font-size:0;font-weight:400;height:17px;background:none;position:relative;top:0px;display:inline-block;font-family:'Glyphicons Halflings';font-style:normal;font-weight:400;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;opacity:1;}.k-numerictextbox .k-select .k-i-arrow-n:before,.k-numerictextbox .k-select .k-i-arrow-s:before{color:#444;font-family:'Glyphicons Halflings';height:17px;line-height:17px;font-size:9px;}.k-numerictextbox .k-link .k-i-arrow-n:before{content:"\e113";}.k-numerictextbox .k-link .k-i-arrow-s:before{content:"\e114";}.k-picker-wrap .k-select .k-i-calendar:before,.k-picker-wrap .k-select .k-i-clock:before{font:normal normal normal 14px/1 FontAwesome;height:17px;line-height:17px;}.k-picker-wrap .k-i-calendar,.k-picker-wrap .k-i-clock{background:none;}.k-calendar-container.k-group{padding:0;border-radius:0;background:#fff;}.k-calendar th{padding:.4em .45em .4em .8em;}.k-picker-wrap .k-i-calendar:before{content:"\f073";}.k-picker-wrap .k-i-clock:before{content:"\f017";}.k-datetimepicker .k-picker-wrap .k-icon{padding:0 3px;}.ui-tooltip{z-index:10005;}.k-multiselect.k-header{border-color:#d2d6de;border-radius:0;}.k-multiselect.k-header.k-state-hover,.k-multiselect.k-header.k-state-focused{border-color:#3c8dbc!important;box-shadow:none!important;}.k-multiselect-wrap{min-height:34px;}.k-multiselect-wrap>.k-input{height:28px;}.k-multiselect-wrap li{line-height:27px;}.k-list-container{border-color:#DEDEDE;background-color:#FFFFFF;}.form-horizontal .form-group .k-dropdown,.k-grid .k-dropdown{cursor:default;width:100%!important;height:32px;}.form-horizontal .form-group .k-dropdown .k-dropdown-wrap,.k-grid .k-dropdown .k-dropdown-wrap{background:#fff;box-shadow:none;padding:0 8px;border:1px solid #d2d6de;border-radius:0;}.form-horizontal .form-group .k-dropdown .k-dropdown-wrap .k-select,.k-grid .k-dropdown .k-dropdown-wrap .k-select{width:20px;}.form-horizontal .form-group .k-dropdown .k-dropdown-wrap.k-state-border-down,.k-grid .k-dropdown .k-dropdown-wrap.k-state-border-down{border-color:#3c8dbc!important;}.form-horizontal .form-group .k-dropdown .k-dropdown-wrap .k-input,.k-grid .k-dropdown .k-dropdown-wrap .k-input{height:32px;line-height:32px;display:block;padding:0;}.form-horizontal .form-group .k-dropdown .k-dropdown-wrap .k-input .image{margin-right:10px;display:inline-block;vertical-align:middle;}.k-animation-container .k-list-container{border:1px solid #3c8dbc!important;box-shadow:none;}.k-animation-container .image{margin-right:10px;display:inline-block;vertical-align:middle;}.k-popup .k-list .k-item.k-state-hover{background:#3c8dbc;border-color:#367fa9;color:#fff;box-shadow:none;}.k-popup .k-list .k-item.k-state-focused{box-shadow:none;}.k-grid-header .k-header{white-space:normal;background-image:none;background-color:#f4f4f4;border:1px solid #e3e3e3;border-left:none;font-weight:bold;padding:10px 8px;}.k-grid-header .k-header:last-child{border-right:none;}.k-grid.k-widget{overflow-x:auto;border:1px solid #e8e8e8;border-top:none;}.k-grid.k-widget .k-grid-toolbar{background:#f1f1f1;border-top:1px solid #e8e8e8;border-bottom:none;}.k-grid.k-widget .k-grid-toolbar .k-button{background:#ffffff;}.k-grid table td{border:none;border-top:1px solid #f3f3f3;border-right:1px solid #e3e3e3;}.k-grid table tr.k-alt td{background-color:#fbfbfb;}.k-grid table tr:first-child>td{border-top:none;}.k-grid table tr:hover>td{background:#f4f4f4;}.k-grid.k-widget .k-pager-wrap{border:none;border-top:1px solid #ededed;background:#f4f4f4;padding:8px 8px 6px 8px;}.k-grid.k-widget .checkbox,.table th .checkbox{min-height:0;padding-top:0;}.k-window-titlebar{height:2em;}.k-grid .k-pager-numbers{margin:0 0 0 -1px;}.k-pager-numbers .k-link{background:#ffffff;border:1px solid #ddd;margin-right:-1px;border-radius:0;height:32px;line-height:31px;min-width:31px;}.k-pager-numbers .k-state-selected{border-radius:0;margin:0px;background:#3c8dbc;height:32px;line-height:31px;min-width:30px;}.k-pager-wrap>.k-link{border-radius:0;margin:0;margin-left:-1px;height:32px;line-height:31px;background:#ffffff;border:1px solid #ddd;min-width:30px;}.k-pager-wrap .k-link:hover{background-color:#eee;border-color:#ddd;}.k-pager-sizes{padding-top:0;}.k-pager-sizes .k-dropdown-wrap.k-state-default{background:#ffffff;border:1px solid #ddd;border-radius:0;height:32px;}.k-pager-sizes .k-dropdown-wrap.k-state-focused{border:1px solid #ddd!important;box-shadow:none!important;}.k-pager-sizes .k-dropdown-wrap .k-input{height:28px;line-height:28px;}.k-pager-sizes .k-widget.k-dropdown{margin-top:0;width:auto!important;min-width:60px;}.k-list .k-state-focused,.k-list .k-state-hover{border-radius:0;background:#3c8dbc;}.main-header{max-height:150px;}.main-header .logo{padding:0;}.main-header .logo-lg{background:url(images/logo.png) no-repeat 50% 50%;height:50px;}.main-header .logo-mini{background:url(images/logo-mini.png) no-repeat 50% 50%;height:50px;}.sidebar-menu,.main-sidebar .user-panel,.sidebar-menu>li.header{white-space:normal;}.sidebar-menu .treeview-menu>li>a{padding:5px 15px;}.sidebar-form{border:none!important;overflow:visible;margin:10px 10px 0!important;}.skin-blue .sidebar-form input[type="text"]{border-radius:2px;}.treeview-menu>li.current-active-item>a{color:#fff;}.admin-search-box{background:url(images/search-icon.png) no-repeat 97%;padding-right:30px;}.navbar-custom-menu>.navbar-nav>li{height:50px;}.navbar-custom-menu li.account-info{line-height:50px;color:#fff;padding:0 15px;}.nav>li>a>img{margin-right:8px;vertical-align:baseline;}.nav-tabs-custom{margin-bottom:5px;}.nav-tabs-custom .tab-pane>.panel{border:none;box-shadow:none;}.nav-tabs-custom .tab-pane>.panel .panel-body{padding:5px;}.nav-tabs-custom+.panel,.panel+.nav-tabs-custom{margin-top:5px;}.nav-tabs-custom .nav-tabs-custom{border-bottom:1px solid #ddd;box-shadow:none;}.nav-tabs-custom>.nav-tabs{border-bottom-color:#ddd;}.nav-tabs-custom>.nav-tabs>li.active>a{border-left-color:#ddd;border-right-color:#ddd;}.nav-tabs-custom>.tab-content{border-right:1px solid #ddd;border-left:1px solid #ddd;}.nav-tabs-custom>.nav-tabs>li.active>a{border-right:1px solid #ddd!important;border-left:1px solid #ddd!important;}.nav-tabs-customer-statistics .chart,.nav-tabs-order-statistics .chart{height:300px;}.content-header>h1{margin-bottom:10px;}.content-header>h1>small{color:#0076BB;font-weight:normal;margin-left:6px;}.content-header>h1>small .fa-arrow-circle-left{font-size:14px;margin-right:1px;}.content-header .btn{margin-bottom:5px;}.content-header .btn-group .dropdown-menu input,.content-header .btn-group .dropdown-menu button,.content-header .btn-group .dropdown-menu a{display:block;background:none;border:none;margin:0;padding:3px 20px;font-weight:400;line-height:1.42857143;color:#777;white-space:nowrap;}.content-header .pull-right .dropdown-menu{right:0;left:auto;box-shadow:3px 3px 5px rgba(0,0,0,0.1);}.form-horizontal .label-wrapper{display:table;float:right;min-height:28px;}.form-horizontal .label-wrapper .control-label{display:table-cell;}.form-horizontal .label-wrapper .ico-help{display:table-cell;color:#3c8dbc;font-size:1.17em;padding-left:6px;}.form-horizontal .label-wrapper i.fa{width:16px;}.form-horizontal .label-wrapper i.fa:before{position:absolute;top:9px;}.form-horizontal span.required{color:#ff2e2e;margin-left:6px;font-size:16px;font-weight:bold;}.form-group{margin-bottom:5px;}.form-group input[type=checkbox]{margin-top:10px;}.form-group .checkbox input[type=checkbox]{margin-top:3px;}.form-group .please-wait{margin-top:10px;}.form-group>div>a{display:inline-block;padding-top:6px;}.form-group .callout{padding:8px 15px;margin-left:-20px!important;}.form-group .attributes label{font-weight:normal;}.form-horizontal .attributes select{width:300px!important;max-width:100%;border-radius:0;border-color:#d2d6de;height:34px;}.form-group .attributes .qty-box{width:48px;display:inline-block;}.form-horizontal .attributes .input-group-required{width:320px;}.form-horizontal .k-autocomplete,.form-horizontal .k-combobox,.form-horizontal .k-numerictextbox,.form-horizontal .k-dropdown,.form-horizontal .k-selectbox,.form-horizontal .k-textbox,.form-horizontal .k-colorpicker,.form-horizontal .k-timepicker,.form-horizontal .k-datetimepicker,.form-horizontal .k-datepicker{width:300px!important;max-width:100%;border-radius:0;border-color:#d2d6de;height:34px;}.k-grid-edit-row>td>.k-numerictextbox{width:100%!important;min-width:150px!important;}.k-grid .k-dropdown{width:100%!important;min-width:120px!important;background:none;}.k-grid .k-textbox{width:100%!important;min-width:150px!important;}.tag-editor{border:1px solid #d2d6de!important;line-height:26px!important;}.form-text-row{padding-top:6px;}.btn-search{margin-top:10px;min-width:150px;padding:7px 10px;font-size:18px;}.panel-search .form-control{max-width:425px;}.panel-search .k-multiselect.k-header{max-width:423px;}.panel-popup .btn-search{margin-left:auto;margin-right:auto;display:block;}.dropdown-toggle.bg-purple{border-left:1px solid #AA89CE;}.input-group .input-group-btn .input-group-btn-hint{font-size:14px;white-space:normal;max-width:330px;}.custom-input-group.input-group-short .custom-input-group-btn,.input-group.input-group-short .input-group-btn{width:auto;}.custom-input-group.input-group-short .bootstrap-touchspin{float:left;margin-right:3px;width:200px;}.input-group.input-group-short .k-widget{margin-right:10px;}.input-group.input-group-short .input-group-text{margin-right:10px;}.input-group-required{width:100%;}.input-group-required .input-group-btn{font-size:inherit;vertical-align:top;width:1.5%;}input[type=file].form-control{height:auto;}.dropdown-menu a:hover{text-decoration:none;}.dropdown-menu>li>a>.fa{margin-right:0;}.editor-settings-modal-dialog{width:985px;}.editor-settings-modal-dialog .modal-body{position:relative;padding:5px 23px 15px 23px;}.editor-settings-modal-dialog .form-group input[type=checkbox]{margin-top:4px;}.editor-settings-modal-dialog .panel-group{margin-bottom:0;}.editor-settings-modal-dialog .panel-body,.editor-settings-modal-dialog .panel-heading{padding:10px 5px;}.editor-settings-modal-dialog .col-md-4{padding:7px;}.store-scope-configuration .label-wrapper{float:left;margin-right:10px;}.form-group+.nav-tabs-localized-fields{margin-top:15px;}.attribute-picture-selection-block .checkbox{display:inline-block;}.attribute-picture-selection-block label{padding-left:0;padding-right:20px;}.mce-panel{border-color:#d2d6de!important;}.mce-container{max-width:100%;}.mce-container label{max-width:inherit;}table td .form-group{margin-bottom:0;margin-top:2px;}.table-bordered{border-collapse:separate;border-spacing:0;border-color:#c5c5c5;border-left:none;}.table-bordered>thead>tr>th,.table-bordered>tbody>tr>th,.table-bordered>tfoot>tr>th,.table-bordered>thead>tr>td,.table-bordered>tbody>tr>td,.table-bordered>tfoot>tr>td{border-color:#c5c5c5;border-style:solid;border-width:0 0 0 1px;}.table-bordered>thead>tr>th,.table-bordered>tbody>tr>th,.table-bordered>tfoot>tr>th,.table-bordered>thead>tr>td{text-align:left;overflow:hidden;border-style:solid;border-width:0 0 1px 1px;padding:.5em .6em .4em .6em;font-weight:normal;white-space:normal;text-overflow:ellipsis;background-image:none,-webkit-linear-gradient(top,rgba(255,255,255,.6) 0,rgba(255,255,255,.0) 100%);background-image:none,-moz-linear-gradient(top,rgba(255,255,255,.6) 0,rgba(255,255,255,.0) 100%);background-image:none,-o-linear-gradient(top,rgba(255,255,255,.6) 0,rgba(255,255,255,.0) 100%);background-image:none,linear-gradient(to bottom,rgba(255,255,255,.6) 0,rgba(255,255,255,.0) 100%);background-position:50% 50%;background-color:#e3e3e3;}.table-bordered tr:nth-child(even){background-color:#f5f5f5;}.table-bordered tr:hover td{background-color:#e3e3e3;}.skin-blue .qq-upload-button{display:inline-block;padding:6px 12px;margin-bottom:4px;font-size:14px;font-weight:400;line-height:1.42857143;text-align:center;white-space:nowrap;vertical-align:middle;-ms-touch-action:manipulation;touch-action:manipulation;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-image:none;border:1px solid transparent;border-radius:4px;background-color:#00a65a;border-color:#008d4c;float:left;margin-right:5px;}.qq-upload-list{float:left;}.qq-upload-list .qq-upload-success{margin-right:5px!important;}.qq-upload-list li.qq-upload-success{background-color:#3c8dbc!important;}.order-list span.order-status{padding:.2em .6em .3em;border-radius:.25em;color:#2e2e2e;}.order-list span.order-status-pending{background-color:#f39c12;color:#fff;}.order-list span.order-status-processing{background-color:#00c0ef;color:#fff;}.order-list span.order-status-complete{background-color:#00a65a;color:#fff;}.order-list span.order-status-cancelled{background-color:#dd4b39;color:#fff;}span.grid-report-item{padding:.2em .6em .3em;border-radius:.25em;color:#2e2e2e;}span.grid-report-item.yellow{background-color:#f39c12;color:#fff;}span.grid-report-item.blue{background-color:#00c0ef;color:#fff;}span.grid-report-item.green{background-color:#00a65a;color:#fff;}span.grid-report-item.red{background-color:#dd4b39;color:#fff;}.theme-selection-block .checkbox{float:left;}.theme-selection-block .checkbox label{padding-left:0;padding-right:20px;}.theme-selection-block .checkbox label img{width:175px;}.theme-selection-block .checkbox label span{display:block;}.theme-selection-block .checkbox label span input{margin:0 5px 8px 0;}.basic-settings-mode .advanced-setting{display:none!important;}.advanced-settings-mode .basic-setting{display:none!important;}.onoffswitch{position:relative;width:130px;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;}.onoffswitch-checkbox{display:none;}.onoffswitch-label{display:block;overflow:hidden;cursor:pointer;border:1px solid #367fa9;border-radius:3px;}.onoffswitch-inner{display:block;width:200%;margin-left:-100%;transition:margin 0.3s ease-in 0s;}.onoffswitch-inner:before,.onoffswitch-inner:after{display:block;float:left;width:50%;height:32px;padding:0;line-height:32px;font-size:14px;color:white;font-family:Trebuchet,Arial,sans-serif;font-weight:bold;}.onoffswitch-inner:before{content:attr(data-locale-advanced);padding-left:10px;background-color:#3c8dbc;color:#FFFFFF;}.onoffswitch-inner:after{content:attr(data-locale-basic);padding-right:10px;background-color:#efefef;color:#3380ad;text-align:right;}.onoffswitch-switch{display:block;width:16px;margin:6.5px;background:#FFFFFF;position:absolute;top:0;bottom:0;right:95px;border:1px solid #367fa9;border-radius:15px;transition:all 0.3s ease-in 0s;}.onoffswitch-checkbox:checked+.onoffswitch-label .onoffswitch-inner{margin-left:0;}.onoffswitch-checkbox:checked+.onoffswitch-label .onoffswitch-switch{right:0px;}.bootstrap-touchspin{max-width:300px;}.bootstrap-touchspin input{height:auto;display:table-cell!important;min-height:34px;}.bootstrap-touchspin-postfix{border-left:none;}.bootstrap-touchspin .input-group-btn-vertical i{left:6px;}.input-group-addon.bootstrap-touchspin-postfix{background-color:#eee;height:34px;}.bootstrap-touchspin .input-group-btn-vertical>.btn{background:#fff;border-color:#d2d6de;border-radius:0;padding:0 10px;height:18px;}.bootstrap-touchspin .input-group-btn-vertical>.btn:hover{border-color:#afafaf;}.bootstrap-touchspin .input-group-btn-vertical .bootstrap-touchspin-down{margin-top:-1px;height:17px;}.throbber-header{font-size:145%;}.throbber{display:none;}.throbber .curtain{position:fixed;left:0;top:0;width:100%;height:100%;background-color:#3e4d45;opacity:0.9;filter:alpha(opacity=90);z-index:9999;}.throbber .curtain-content{position:absolute;left:0;top:0;width:100%;height:100%;z-index:9999;}.throbber .curtain-content div{text-align:center;padding:250px;color:#FFF;}#ajaxBusy{display:none;left:0;position:fixed;top:0;width:100%;z-index:100000;}#ajaxBusy span{background:url(images/ajax-loading.gif) no-repeat;width:40px;height:40px;float:right;margin:9px 9px 0px 0px;}@media (max-width: 1200px) {.main-header .navbar-custom-menu{float:none;}.main-header .navbar-custom-menu>.navbar-nav{float:none;}.form-horizontal .label-wrapper .ico-help{display:none;}.form-horizontal .panel-popup .ico-help{display:block;}.form-horizontal .panel-popup .form-group input[type=checkbox]{margin-top:10px;}.form-control{margin-bottom:3px;}.k-autocomplete,.k-combobox,.k-datepicker,.k-timepicker,.k-datetimepicker,.k-colorpicker,.k-numerictextbox,.k-dropdown,.k-selectbox,.k-textbox,.k-datetimepicker{margin-bottom:3px;}.k-grid.k-widget>table{min-width:400px;}}@media (max-width: 992px) {.form-horizontal .label-wrapper{float:none;margin-bottom:3px;margin-top:5px;}.form-horizontal .panel-popup .label-wrapper{float:right;}.form-horizontal .panel-popup .label-wrapper .control-label{padding-top:0;}.form-horizontal .panel-popup .form-group input[type=checkbox]{margin-top:10px;}.form-group input[type=checkbox]{margin-top:2px;}.form-group .callout{margin-left:0!important;margin-top:5px!important;}.panel-search .form-control{max-width:100%;}}@media (max-width: 767px) {.modal-dialog{margin-top:30px;}.main-header{max-height:200px;}.form-horizontal .panel-popup .label-wrapper{float:left;}}
 </style>
</head>
 
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>DM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>DAK</b>MARK</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('backend/images/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('backend/images/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('backend/images/user4-128x128.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('backend/images/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{asset('backend/images/user4-128x128.jpg')}}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('backend/images/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->last_name}} {{Auth::user()->first_name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('backend/images/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                {{Auth::user()->last_name}} {{Auth::user()->first_name}} - Admin
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('backend/images/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->last_name}} {{Auth::user()->first_name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{url('/admin')}}"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Bán Hàng</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/orders')}}"><i class="fa fa-circle-o"></i> Đơn Hàng</a></li>
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Tạo Mới</a></li> -->
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Thống Kê</a></li> -->
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Thiết Lập</a></li> -->
          </ul>
        </li>
        <!-- <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Sản Phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/products')}}"><i class="fa fa-circle-o"></i> Danh Mục</a></li>
            <li><a href="{{url('admin/products/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
            <li><a href="{{url('admin/products/categories')}}"><i class="fa fa-circle-o"></i> Chủ Đề</a></li>
            <li><a href="{{url('admin/products/reviews')}}"><i class="fa fa-circle-o"></i> Đánh Giá</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/posts/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
            <li><a href="{{url('admin/posts')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
            <li><a href="{{url('admin/posts/categories')}}"><i class="fa fa-circle-o"></i> Chủ Đề</a></li>
            <li><a href="{{url('admin/posts/comments')}}"><i class="fa fa-circle-o"></i> Bình Luận</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/menu')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
            <li><a href="{{url('/admin/menu/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
            <!-- <li><a href="{{url('/admin/menu/config')}}"><i class="fa fa-circle-o"></i> Thiết Lập</a></li> -->
          </ul>
        </li>
        <!-- FAQ -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-question"></i> <span>FAQ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/faqs')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
            <li><a href="{{url('/admin/faqs/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
          </ul>
        </li>     

        <!-- InfoPage -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Trang thông tin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/info-pages')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
            <li><a href="{{url('/admin/info-pages/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
          </ul>
        </li>    

        <!-- Slider-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-picture-o"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/sliders')}}"><i class="fa fa-circle-o"></i> Danh Sách</a></li>
            <li><a href="{{url('/admin/sliders/create')}}"><i class="fa fa-circle-o"></i> Tạo Mới</a></li>
          </ul>
        </li>                     
      
        <li class="header">QUICK VIEW</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Đơn Hàng</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Sản Phẩm</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')    
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.9
    </div>
    <strong>Copyright &copy; 2018 <a href="#">Dakmark Food</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
<!-- aside here- has been remove-->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div> -->
</div>
    <!-- /#wrapper -->
    <!-- jQuery 3 -->
    <script src="{{asset('backend/js/jquery-3.2.1.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('backend/dist/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('backend/dist/bootstrap-3.3.7/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <!-- <script src="{{asset('backend/js/raphael.min.js')}}"></script> -->
    <script src="{{asset('backend/js/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('backend/js/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('backend/js/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <!-- <script src="{{asset('adminlte/js/jquery.knob.min.js')}}"></script> -->
    <!-- daterangepicker -->
    <script src="{{asset('backend/js/moment.js')}}"></script>
    <!-- <script src="{{asset('backend/js/daterangepicker.js')}}"></script> -->
    <!-- datepicker -->
    <script src="{{asset('backend/dist/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <!-- <script src="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script> -->
    <!-- Slimscroll -->
    <!-- <script src="{{asset('adminlte/js/jquery.slimscroll.min.js')}}"></script> -->
    <!-- FastClick -->
    <!-- <script src="{{asset('adminlte/js/fastclick.js')}}"></script> -->
    <!-- AdminLTE App -->
    <script src="{{asset('backend/js/adminlte.min.js')}}"></script>     
    <script src="{{asset('backend/dist/ckeditor/ckeditor.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('backend/dist/select2/js/select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/dist/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script> 
    <script>
                (function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                })();
    </script>
    @yield('scripts')
</body>
</html>