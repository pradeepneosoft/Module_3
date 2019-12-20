<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_images';

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
    protected $fillable = ['image_name', 'product_id', 'status', 'created_by', 'updated_by'];
    public function product()
    {
        return $this->belongsTo('App\product');
    }

    
}
