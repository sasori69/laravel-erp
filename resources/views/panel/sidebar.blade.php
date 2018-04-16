<div class="sidebar">
	<nav class="sidebar-nav">
		<ul class="nav">
			<li class="nav-item">
				<a class="nav-link" href="{{env('APP_URL','/')}}">
					<i class="icon-speedometer"></i> Dashboard </a>
			</li>
			@if(Auth::user()->hasAcc('master-setting'))
			<li class="nav-item">
				<a class="nav-link nav-link-success" href="{{route('master-setting.index')}}" target="_top"><i class="icon-settings"></i><strong>SETTINGS</strong></a>
			</li>
			@endif
			<li class="nav-title">Modules</li>
			<?php $list_mp = (Auth::user()->email == env('ROOT_USERNAME')?Auth::user()->modPermissions():Auth::user()->modulePermissions); ?>
				@foreach ($list_mp as $lmp)
				<li id='{{$lmp['_id']}}' class="nav-item nav-dropdown">
					<a class="nav-link {{(count($lmp['child'])>0?'nav-dropdown-toggle':'')}}" @if($lmp['slug'] !='' && Route::has($lmp[
					    'slug']. '.index')) href="{{route($lmp['slug'].'.index')}}" @else href="#" @endif>
						<i class="{{$lmp['icon']}}"></i>{{$lmp['name']}}</a>
					<ul class="nav-dropdown-items">
						@foreach($lmp['child'] as $lmp2)
						<li class="nav-item">
							<a class="nav-link {{ (Request::is($lmp2['slug'].'/*')?'active':'') }}" 
                                @if($lmp2['slug'] !='' && Route::has($lmp2['slug']. '.index')) 
                                href="{{route($lmp2['slug'].'.index')}}" 
                                @else 
                                href="#" 
                                @endif>
								<i class="{{$lmp2['icon']}}"></i> {{$lmp2['name']}}</a>
						</li>

						@if(Request::is($lmp2['slug'].'/*'))
						<script>
							var element = document.getElementById("{{$lmp2['parent']}}");
							element.classList.add("open");
						</script>
						@endif @endforeach
					</ul>
				</li>
				@endforeach

		</ul>
	</nav>
	<button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>