<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingCategories extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function trainings() {
        return $this->hasMany(Training::class);
    }

    public function schedules() {
        return $this->hasMany(Schedule::class);
    }

    public function softskill() {
        return $this->hasMany(Softskill::class);
    }

    public function kemnaker() {
        return $this->hasMany(KemnakerCertifications::class);
    }

    public function bnsp() {
        return $this->hasMany(BnspCertifications::class);
    }

    public function ad() {
        return $this->hasMany(Ad::class);
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
