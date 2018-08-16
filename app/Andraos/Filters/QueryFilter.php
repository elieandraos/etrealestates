<?php 

namespace App\Andraos\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    protected $filters, $builder;

    /**
     * Create a new QueryFilter instance
     * 
     * @param Array $filters 
     * @return type
     */
    public function __construct(Array $filters)
    {
        $this->filters = $filters;
    }

    /**
     * Apply the filters to the builder.
     *
     * @param  Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        
        foreach ($this->filters() as $name => $value) {
            if (! method_exists($this, $name)) {
                continue;
            }
            if(is_array($value)){
                call_user_func_array([$this, $name], [$value]);
            }
            elseif(strlen($value)) {
                $this->$name($value);
            } 
            else {
                $this->$name();
            }
        }

        return $this->builder;
    }

    /**
     * Get all request filters data.
     *
     * @return array
     */
    public function filters()
    {
        return $this->filters;
    }
}