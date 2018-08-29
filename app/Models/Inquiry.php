<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table = 'inquiries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
        'reference',
        'status'
    ];

    /**
     * Created at accessor
     * 
     * @param type $value 
     * @return type
     */
    public function getInquiredAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('d M, Y h:i');
    }
}
