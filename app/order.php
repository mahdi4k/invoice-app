<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
     protected $fillable =['user_id','order_value','numberFactor'];
}
