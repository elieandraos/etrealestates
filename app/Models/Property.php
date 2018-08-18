<?php

namespace App\Models;

use Carbon\Carbon;
use App\Andraos\Traits\Filterable;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Property extends Model implements HasMedia
{
    use HasMediaTrait, Filterable;

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

    /***
     * Accessor for thumb featured image url
     
     * @return type
     */
    public function getFeaturedImageThumbUrlAttribute()
    {
        if(!$this->hasMedia('featured'))
            return null;

        $media = $this->getFirstMediaUrl('featured', 'thumb');
        return url($media);
    }

    /***
     * Accessor for full featured image url

     * @return type
     */
    public function getFeaturedImageUrlAttribute()
    {
        if(!$this->hasMedia('featured'))
            return null;

        $media = $this->getFirstMediaUrl('featured', 'full');
        return url($media);
    }

    /***
     * Accessor to check if the property has map information

     * @return type
     */
    public function getHasMapCredentialsAttribute()
    {
        return ($this->lat && $this->lng) ? true : false;
    }

    /**
     * Gets the base64 encoded featured image
     * 
     * @return type
     */
    public function getEncodedFeaturedImageAttribute()
    {
        if(!$this->hasMedia('featured'))
            return null;

        $path =  $this->getFirstMediaPath('featured', 'thumb');
        $data = file_get_contents($path);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    /**
     * Property media collection
     * 
     * @return type
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('featured')
                ->singleFile()
                ->registerMediaConversions(function (Media $media) {
                    $this
                        ->addMediaConversion('thumb')
                        ->width(320)
                        ->height(240);

                    $this
                        ->addMediaConversion('full')
                        ->width(768)
                        ->height(576);
                });
    }
    
}
