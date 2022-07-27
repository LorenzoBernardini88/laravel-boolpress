<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['post_author', 'title', 'content', 'post_date','slug','category_id'];
    
    //funzuione che collega tabelle post e categorie relazione one to many
    public function category(){
        return $this->belongsTo('App\Category');
    }
    //funzione che collega tabelle tags e posts relazione many to many 
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    // funzione che collega le tabelle comments e posts (relazione one to many)
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
