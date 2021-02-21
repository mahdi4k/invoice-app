<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pipe extends Model
{
     protected $fillable=['name','price','count','img','mainPipe','unit','parentPipe','property'];

    public function factoryPipe()
    {
        return $this->belongsToMany(FactoryPipe::class,'factorypip_pipe','pipe_id','factorypip_id');
    }


}
