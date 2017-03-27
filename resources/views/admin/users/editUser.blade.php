@extends('admin.layout.main')
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
				<li>
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
<div class="page-head">
	<!-- BEGIN PAGE TITLE -->
	<div class="page-title">
		<h1>Thành viên <small>Sửa thành viên</small></h1>
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
	</li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
			<div class="tab-content">
				<div class="tab-pane active" id="tab_0">
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Sửa thành viên
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="{{route("users.update", $data->id)}}" enctype="multipart/form-data" role="form" method="POST" class="form-horizontal">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PUT">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Họ tên</label>
										<div class="col-md-4">
											<input type="text" name="name" value="{!! $data->name !!}" class="form-control input-circle" placeholder="Ví dụ: Lê Thị Kim Anh" required>
											@if ($errors->has('name'))
												<span class="error-block">
                                        			<strong>{{ $errors->first('name') }}</strong>
                                    			</span>
											@endif
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Email</label>
										<div class="col-md-4">
											<div class="input-group">
												<span class="input-group-addon input-circle-left">
												<i class="fa fa-envelope"></i>
												</span>
												<input type="email" name="email" value="{!! $data->email !!}" class="form-control input-circle-right" placeholder="Ví dụ: lethikimanh@gmail.com" required>
											</div>
											@if ($errors->has('email'))
												<span class="error-block">
                                        			<strong>{{ $errors->first('email') }}</strong>
                                    			</span>
											@endif
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Chức vụ</label>
										<div class="col-md-4">
											<select name="role" class="form-control">
												<option value="3">Cộng tác viên</option>
												<option value="2">Biên tập viên</option>
												<option value="1">Quản lý</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Địa chỉ</label>
										<div class="col-md-4">
											<input type="text" name="address" value="{!! $data->address !!}" class="form-control input-circle" placeholder="Ví dụ: Hoàng Liệt, Hoàng Mai, Hà Nội" required>
											@if ($errors->has('address'))
												<span class="error-block">
                                        			<strong>{{ $errors->first('address') }}</strong>
                                    			</span>
											@endif
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Số điện thoại</label>
										<div class="col-md-4">
											<input type="text" name="phone" value="{!! $data->phone !!}" class="form-control input-circle" placeholder="Ví dụ: 01678511234" required>
											@if ($errors->has('phone'))
												<span class="error-block">
                                        			<strong>{{ $errors->first('phone') }}</strong>
                                    			</span>
											@endif
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Ảnh đại diện</label>
										<div class="col-md-4">
											<input type="file" name="avatar" class="form-control">
											<p class="help-block">Chọn ảnh có kích thước tối đa 2M</p>
											@if ($errors->has('avatar'))
												<span class="error-block">
												<strong>{{ $errors->first('avatar') }}</strong>
											</span>
											@endif
										</div>
										<div class="col-md-offset-1 col-md-4">
											@if(isset($data->avatar_link))
												<img id="avatar-old" src="{!! asset("$data->avatar_link") !!}">
											@endif
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Tên đăng nhập</label>
										<div class="col-md-4">
											<input type="text" name="username" value="{!! $data->username !!}" class="form-control input-circle" placeholder="Không được chứa ký tự đặc biệt" required>
											@if ($errors->has('name'))
												<span class="error-block">
                                        			<strong>{{ $errors->first('username') }}</strong>
                                    			</span>
											@endif
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Mật khẩu</label>
										<div class="col-md-4">
											<button type="button" id="btnedit" class="btn btn-warning"><i class="fa fa-pencil fa-2x"></i></button>
											<input type="password" id="inputpass" name="password" class="form-control input-circle" placeholder="Không được chứa ký tự đặc biệt" required>
											<script>
                                                $(document).ready(function(){
                                                    $("#btnedit").click(function(){
                                                        $(this).hide();
                                                        $("#inputpass").css("display", "block");
                                                    });
                                                });
											</script>
											@if ($errors->has('password'))
												<span class="error-block">
                                        			<strong>{{ $errors->first('password') }}</strong>
                                    			</span>
											@endif
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn btn-circle blue">Submit</button>
											<button type="reset" class="btn btn-circle default">Cancel</button>
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- END PAGE CONTENT-->
@stop
<script src="{{asset('js/jquery-3.2.0.min.js')}}"></script>