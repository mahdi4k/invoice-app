<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactoryPipe extends Model
{
    protected $fillable=['name','img'];
    public function pipe()
    {
        return $this->belongsToMany(Pipe::class,'factorypip_pipe','factorypip_id','pipe_id');
    }

}

