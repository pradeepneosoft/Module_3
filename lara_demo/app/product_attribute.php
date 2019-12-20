<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_attribute extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_attributes';

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
    protected $fillable = ['name'];
    public function get_values()
    {
        return $this->hasMany('App\product_attr_val','product_attributes_id','id');
    }
    
}
