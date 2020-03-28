<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
	  use Sluggable;
    protected $fillable =[
    	'title',
    	'description',
    	'createdAt',
    	'user_id',
         'slug',
     ];


     public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sluggable()
    {
        return [
            'slug' => [
               'source' => 'title'
            ]
        ];
    }
    
    
}



 
