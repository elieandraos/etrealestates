<ul>
	<li>
        <a class="" href="{!! route('areas.edit', $area->id) !!}">
            <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit Area"></i>
        </a>

        <confirm-delete :title="'Delete Area'" :url="'{!! route('areas.destroy', $area->id) !!}'"></confirm-delete>
    </li>
</ul>