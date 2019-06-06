<ul>
	<li>
        <a class="" href="{!! route('properties.edit', $property->id) !!}">
            <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit Property"></i>
        </a>

        <a class="" href="{!! route('properties.gallery', $property->id) !!}">
            <i class="fa fa-picture-o" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Upload Images"></i>
        </a>

        <confirm-delete :title="'Delete Property'" :url="'{!! route('properties.destroy', $property->id) !!}'"></confirm-delete>
    </li>
</ul>