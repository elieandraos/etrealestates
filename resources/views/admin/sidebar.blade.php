<ul class='sidebar-menu'>
	<li class='header'>Manage</li>
	<li>
		<a href='{!! route('properties.index') !!}' @if(URL::current() == URL::to('properties')) class='active' @endif>
			<i class="fa fa-home" aria-hidden="true"></i> Properties
		</a>
	</li>
	<li>
		<a href='{!! route('inquiries.index') !!}' @if(URL::current() == URL::to('inquiries')) class='active' @endif>
			<i class="fa fa-envelope-o" aria-hidden="true"></i> Inquiries 
			@if($nbNewInquiries)
				<span class="badge badge-secondary" style="font-size:66%">{!! $nbNewInquiries !!}</span>
			@endif
		</a>
	</li>
	<li class='header'>Administration</li>
	<li>
		<a href='{!! route('areas.index') !!}' @if(URL::current() == URL::to('areas')) class='active' @endif>
			<i class="fa fa-cube" aria-hidden="true"></i> Areas
		</a>
	</li>
		<li>
		<a href='{!! route('types.index') !!}' @if(URL::current() == URL::to('types')) class='active' @endif>
			<i class="fa fa-anchor" aria-hidden="true"></i> Types
		</a>
	</li>
</ul>