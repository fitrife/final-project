<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Softskills extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function training() {
        return $this->belongsTo(Training::class, 'training_id');
    }

    public function ad() {
        return $this->belongsTo(Ad::class, 'ad_id');
    }
    
    public function training_category() {
        return $this->belongsTo(TrainingCategories::class, 'training_categories_id');
    }

    public function staff() {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function getRouteKeyName()
    {
        return 'slugSoftskill';
    }

    public function sluggable(): array
    {
        return [
            'slugSoftskill' => [
                'source' => 'name'
            ]
        ];
    }
}
