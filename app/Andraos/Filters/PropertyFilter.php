<?php 

namespace App\Andraos\Filters;

class PropertyFilter extends QueryFilter
{
    /**
     * Filter by area
     * 
     * @param type $value 
     * @return type
     */
    public function area($value = null)
    {
        if(!$value || $value == -1)
            return $this->builder;

        return $this->builder->where('area_id', $value);
    }

    /**
     * Filter by type
     * 
     * @param type $value 
     * @return type
     */
    public function type($value)
    {
        if($value == -1)
            return $this->builder;

        return $this->builder->where('type_id', $value);
    }


    /**
     * Filter by maximum amount
     * 
     * @param type $value 
     * @return type
     */
    public function maxAmount($value)
    {
        if($value == -1)
            return $this->builder;
        
        return $this->builder->where('amount', '<=', $value);
    }

    /**
     * Filter by is published
     * 
     * @param type|bool $value 
     * @return type
     */
    public function published($value = true)
    {
        return $this->builder->where('is_published', $value);
    }

    /**
     * Filter by reference
     * 
     * @param type|null $value 
     * @return type
     */
    public function reference($value = null)
    {
        if(!trim($value))
            return $this->builder;

        return $this->builder->where('reference', 'LIKE', '%'.$value.'%');
    }
}

?>