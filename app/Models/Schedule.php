<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    protected $fillable = [
        'training_categories_id', 'training_id','name', 'method', 'schedule'
    ];
    protected $with = ['training_category', 'training'];

    public function training_category() {
        return $this->belongsTo(TrainingCategories::class, 'training_categories_id');
    }

    public function training() {
        return $this->belongsTo(Training::class, 'training_id');
    }

    public function ad() {
        return $this->belongsTo(Ad::class, 'ad_id');
    }

    // route model binding
    public function getRouteKeyName()
    {
        return 'id';
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'name'
    //         ]
    //     ];
    // }
}
