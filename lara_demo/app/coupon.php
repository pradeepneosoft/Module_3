<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupons';

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
    protected $fillable = ['code', 'percent_off', 'created_by', 'updated_by', 'no_of_uses'];

    
}
