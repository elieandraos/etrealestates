<?php

namespace App\Observers;

use App\Models\Area;
use App\Models\Property;

class PropertyObserver
{
    /**
     * Handle the property after being created.
     *
     * @param  \App\Property  $property
     * @return void
     */
    public function created(Property $property)
    {
        $areaCode = strtoupper(substr($property->area->name, 0, 1)); // first letter of the area
        $cityCode = strtoupper(substr($property->city, 0, 1)); // first letter of the city
        $property->reference = $areaCode.$cityCode.$property->id;
        $property->save();
    }
}
