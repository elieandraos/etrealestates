<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'amount',
        'sq_ft',
        'city',
        'reference',
        'nb_bathrooms',
        'nb_parkings',
        'nb_bedrooms',
        'additional_info',
        'lat',
        'lng',
        'listed_for',
        'area_id',
        'type_id',
        'listed_by'
    ];

    /**
     * Get the area that owns the property.
     */
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    /**
     * Get the area that owns the property.
     */
    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    /**
     * Get the user that owns the property.
     */
    public function author()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Amount accessor
     * 
     * @param type $value 
     * @return type
     */
    public function getAmountDisplayAttribute()
    {
        return number_format($this->amount, 0, '.', ',')." $";
    }

    /**
     * Created at accessor
     * 
     * @param type $value 
     * @return type
     */
    public function getListedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('d M, Y');
    }
}
