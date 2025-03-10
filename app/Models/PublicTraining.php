<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PublicTraining extends Model
{
    use HasFactory, Sluggable;
    
    protected $guarded = ['id']; 

    public function staff() {
        return $this->belongsTo(User::class, 'user_id'); 
    }
    // route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
