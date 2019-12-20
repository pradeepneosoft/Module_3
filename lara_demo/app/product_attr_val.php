<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_attr_val extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_attr_vals';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['value', 'product_attributes_id'];
    public function get_attributes()
    {
        return $this->belongsTo('App\product_attribute','product_attributes_id','id');
    }

    
}
