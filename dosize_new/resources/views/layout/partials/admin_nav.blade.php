<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span><i class="fe fe-home"></i> ראשי</span>
							</li>
							@if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Brand Manager'))
								@if(Auth::user()->hasRole('Admin'))
								<li class="{{ Request::is('dashboard/dashboard') ? 'active' : '' }}"> 
									<a href="{{route('dashboard')}}"><span>דף ניהול</span></a>
								</li>
								@endif
								@if(Auth::user()->hasRole('Brand Manager'))
								<li class="{{ Request::is('dashboard/dashboard') ? 'active' : '' }}"> 
								<a href="{{route('dashboard')}}"><span>דף ניהול</span></a>
								</li>
								@endif

							@if(Auth::user()->hasRole('User'))
							<li class="{{ Request::is('user/profile') ? 'active' : '' }}">
								<a href="{{ url('user/profile') }}"><span> הגדרות הפרופיל </span></a>
							</li>
							@endif
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar