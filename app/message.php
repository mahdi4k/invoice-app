<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $table = 'message';
    protected $fillable = ['message','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
