<ul class='sidebar-menu'>
	<li class='header'>Manage</li>
	<li>
		<a href='{!! route('areas.index') !!}' @if(URL::current() == URL::to('areas')) class='active' @endif>
			<i class="fa fa-cube" aria-hidden="true"></i> Areas
		</a>
	</li>
	<li><a href='#'><i class="fa fa-home" aria-hidden="true"></i> Properties</a></li>

</ul>