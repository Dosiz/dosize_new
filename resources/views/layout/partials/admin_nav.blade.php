<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span><i class="fe fe-home"></i> ראשי</span>
							</li>
								@if(Auth::user()->hasRole('Admin'))
								<li class="{{ Request::is('dashboard/dashboard') ? 'active' : '' }}"> 
									<a href="{{route('dashboard')}}"><span>דף ניהול</span></a>
								</li>
							<li class="menu-title"> 
								<span><i class="fe fe-document"></i> ג'נרל </span>
							</li>
								<li class="{{ Request::is('admin/city') ? 'active' : '' }}"> 
									<a href="{{url('admin/city')}}"><span> ערים </span></a>
								</li>
								<li class="{{ Request::is('admin/category') ? 'active' : '' }}"> 
									<a href="{{url('admin/category')}}"><span> קטגוריה </span></a>
								</li>
								<li class="{{ Request::is('admin/sub-category') ? 'active' : '' }}"> 
									<a href="{{url('admin/sub-category')}}"><span> קטגוריית משנה </span></a>
								</li>

								<li class="{{ Request::is('admin/admin_product') ? 'active' : '' }}"> 
									<a href="{{url('admin/admin_product')}}"><span> Product </span></a>
								</li>

								<li class="{{ Request::is('admin/admin_product_orders') ? 'active' : '' }}"> 
									<a href="{{url('admin/admin_product_orders')}}"><span> Order </span></a>
								</li>

							<li class="menu-title"> 
								<span><i class="fe fe-user"></i> מִשׁתַמֵשׁ </span>
							</li>
								<li class="{{ Request::is('admin/brands') ? 'active' : '' }}"> 
									<a href="{{url('admin/brands')}}"><span> מותג </span></a>
								</li>
								<li class="{{ Request::is('admin/users') ? 'active' : '' }}"> 
									<a href="{{url('admin/users')}}"><span> משתמשים </span></a>
								</li>

								@endif
								@if(Auth::user()->hasRole('Manager'))
								<li class="{{ Request::is('dashboard/dashboard') ? 'active' : '' }}"> 
								<a href="{{route('dashboard')}}"><span>דף ניהול</span></a>
								</li>
								@endif
								@if(Auth::user()->hasRole('Brand'))
								<li class="{{ Request::is('dashboard/dashboard') ? 'active' : '' }}"> 
									<a href="{{route('dashboard')}}"><span>דף ניהול</span></a>
								</li>

								<li class="{{ Request::is('brand/blog') ? 'active' : '' }}"> 
									<a href="{{route('blog.index')}}"><span> בלוגים </span></a>
								</li>

								<li class="{{ Request::is('brand/product') ? 'active' : '' }}"> 
									<a href="{{route('product.index')}}"><span> מוצר </span></a>
								</li>

								<li class="{{ Request::is('brand/brand-message') ? 'active' : '' }}"> 
									<a href="{{route('brand-message.index')}}"><span> הודעה למנוי	</span></a>
								</li>
                                <li class="{{ Request::is('brand/messages') ? 'active' : '' }}"> 
                                    <a href="{{url('brand/messages?id='.Auth::user()->id.'')}}"><span>Chat</span></a>
                                </li>

								<li class="{{ Request::is('brand/brand_subscriber') ? 'active' : '' }}"> 
                                    <a href="{{url('brand/brand_subscriber?id='.Auth::user()->id.'')}}"><span>Subscriber</span></a>
                                </li>

								<li class="{{ Request::is('brand/product_comments') ? 'active' : '' }}"> 
                                    <a href="{{url('brand/product_comments?id='.Auth::user()->id.'')}}"><span>Product Comments</span></a>
                                </li>

								<li class="{{ Request::is('brand/blog_comments') ? 'active' : '' }}"> 
                                    <a href="{{url('brand/blog_comments?id='.Auth::user()->id.'')}}"><span>Blog Comments</span></a>
                                </li>

								@endif

							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar