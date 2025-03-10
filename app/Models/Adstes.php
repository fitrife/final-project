<?php

namespace App\Models;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ads extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['training_categories'];

    public function training_categories() {
        return $this->belongsTo(TrainingCategories::class, 'training_categories_id');
    } 

    public function schedule() {
        return $this->hasMany(Schedule::class);
    }

    public function education() {
        return $this->hasMany(Education::class);
    }

    public function clients() {
        return $this->hasMany(Clients::class);
    }

    public function soffskills() {
        return $this->hasMany(Softskills::class);
    }

    public function bnspCertifications() {
        return $this->hasMany(BnspCertifications::class);
    }

    public function kemnakerCertifications() {
        return $this->hasMany(KemnakerCertifications::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
