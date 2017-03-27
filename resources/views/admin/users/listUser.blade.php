@extends("admin.layout.main")
@section('slidebar')
    <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li>
            <a href="index.html">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <i class="icon-pencil"></i>
                <span class="title">Posts</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="ecommerce_index.html">
                        <i class="icon-folder"></i>
                        All Posts</a>
                </li>
                <li>
                    <a href="ecommerce_orders.html">
                        <i class="icon-plus"></i>
                        Add New</a>
                </li>
                <li>
                    <a href="ecommerce_orders_view.html">
                        <i class="fa fa-briefcase"></i>
                        Categories</a>
                </li>
                <li>
                    <a href="ecommerce_products.html">
                        <i class="icon-tag"></i>
                        Tags</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fa fa-video-camera"></i>
                <span class="title">Media</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="layout_sidebar_reversed.html">
                        Library</a>
                </li>
                <li>
                    <a href="layout_sidebar_fixed.html">
                        Add New</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fa fa-comments"></i>
                <span class="title">Comments</span>
                <span class="arrow "></span>
            </a>
        </li>
        <li class="start active">
            <a href="javascript:;">
                <i class="icon-user"></i>
                <span class="title">Users</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="active">
                    <a href="components_pickers.html">
                        All Users</a>
                </li>
                <li>
                    <a href="components_context_menu.html">
                        Add New</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fa fa-gavel"></i>
                <span class="title">Roles and Previleges</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="components_pickers.html">
                        All Roles</a>
                </li>
                <li>
                    <a href="components_context_menu.html">
                        Add New</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fa fa-desktop"></i>
                <span class="title">Appearance</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="components_pickers.html">
                        Menu</a>
                </li>
                <li>
                    <a href="components_context_menu.html">
                        Other</a>
                </li>
            </ul>
        </li>
    </ul>
@stop
@section("page-content")
    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    Widget settings form goes here
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn blue">Save changes</button>
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Thành viên <small>Tất cả thành viên</small></h1>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PAGE TOOLBAR -->
        <div class="page-toolbar">
            <!-- BEGIN THEME PANEL -->
            <div class="btn-group btn-theme-panel">
                <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-settings"></i>
                </a>
                <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <h3>THEME</h3>
                            <ul class="theme-colors">
                                <li class="theme-color theme-color-default active" data-theme="default">
                                    <span class="theme-color-view"></span>
                                    <span class="theme-color-name">Dark Header</span>
                                </li>
                                <li class="theme-color theme-color-light" data-theme="light">
                                    <span class="theme-color-view"></span>
                                    <span class="theme-color-name">Light Header</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12 seperator">
                            <h3>LAYOUT</h3>
                            <ul class="theme-settings">
                                <li>
                                    Theme Style
                                    <select class="layout-style-option form-control input-small input-sm">
                                        <option value="square" selected="selected">Square corners</option>
                                        <option value="rounded">Rounded corners</option>
                                    </select>
                                </li>
                                <li>
                                    Layout
                                    <select class="layout-option form-control input-small input-sm">
                                        <option value="fluid" selected="selected">Fluid</option>
                                        <option value="boxed">Boxed</option>
                                    </select>
                                </li>
                                <li>
                                    Header
                                    <select class="page-header-option form-control input-small input-sm">
                                        <option value="fixed" selected="selected">Fixed</option>
                                        <option value="default">Default</option>
                                    </select>
                                </li>
                                <li>
                                    Top Dropdowns
                                    <select class="page-header-top-dropdown-style-option form-control input-small input-sm">
                                        <option value="light">Light</option>
                                        <option value="dark" selected="selected">Dark</option>
                                    </select>
                                </li>
                                <li>
                                    Sidebar Mode
                                    <select class="sidebar-option form-control input-small input-sm">
                                        <option value="fixed">Fixed</option>
                                        <option value="default" selected="selected">Default</option>
                                    </select>
                                </li>
                                <li>
                                    Sidebar Menu
                                    <select class="sidebar-menu-option form-control input-small input-sm">
                                        <option value="accordion" selected="selected">Accordion</option>
                                        <option value="hover">Hover</option>
                                    </select>
                                </li>
                                <li>
                                    Sidebar Position
                                    <select class="sidebar-pos-option form-control input-small input-sm">
                                        <option value="left" selected="selected">Left</option>
                                        <option value="right">Right</option>
                                    </select>
                                </li>
                                <li>
                                    Footer
                                    <select class="page-footer-option form-control input-small input-sm">
                                        <option value="fixed">Fixed</option>
                                        <option value="default" selected="selected">Default</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END THEME PANEL -->
        </div>
        <!-- END PAGE TOOLBAR -->
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="index.html">Users</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">All users</a>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Quản lý thành viên</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn btn-default btn-circle" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-share"></i> Tools <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;">
                                        Export to Excel </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        Export to CSV </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        Export to XML </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        Print Invoices </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-container">
                        <div class="table-actions-wrapper">
									<span>
									</span>
                            <select class="table-group-action-input form-control input-inline input-small input-sm">
                                <option value="">Select...</option>
                                <option value="publish">Publish</option>
                                <option value="unpublished">Un-publish</option>
                                <option value="delete">Delete</option>
                            </select>
                            <button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatable_products">
                            <thead>
                            <tr role="row" class="heading">
                                <th width="1%">
                                    <input type="checkbox" class="group-checkable">
                                </th>
                                <th width="10%" class="text-center">
                                    STT
                                </th>
                                <th width="15%" class="text-center">
                                    Email
                                </th>
                                <th width="15%" class="text-center">
                                    Họ tên
                                </th>
                                <th width="10%" class="text-center">
                                    SĐT
                                </th>
                                <th width="10%" class="text-center">
                                    Địa chỉ
                                </th>
                                <th width="15%" class="text-center">
                                    Vai trò
                                </th>
                                <th width="10%" class="text-center">
                                    Bài viết
                                </th>
                                <th width="10%" class="text-center">
                                    Tác vụ
                                </th>
                            </tr>
                            <?php $index = 0; ?>
                            @foreach($data as $value)
                                <tr role="row" class="filter">
                                    <td>
                                        <input type="checkbox" class="group-checkable">
                                    </td>
                                    <td class="text-center">
                                        {!! $index += 1 !!}
                                    </td>
                                    <td class="text-center">
                                        {!! $value->email !!}
                                    </td>
                                    <td class="text-center">
                                        {!! $value->name !!}
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">

                                    </td>
                                    <td class="text-center">
                                        {!! $value->name_role !!}
                                    </td>
                                    <td class="text-center">

                                    </td>
                                    <td class="text-center">
                                        <div class="text-center">
                                            <a href="{{route('users.edit', $value->id)}}" class="margin-right-10"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:;"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>
    </div>
@stop
