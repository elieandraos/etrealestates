<ul>
	<li>
        <a class="" href="{!! route('types.edit', $type->id) !!}">
            <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit Type"></i>
        </a>

        <confirm-delete :title="'Delete Type'" :url="'{!! route('types.destroy', $type->id) !!}'"></confirm-delete>
    </li>
</ul>