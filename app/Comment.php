<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{   
    //funzione collega comments a posts relazione one to many 
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
