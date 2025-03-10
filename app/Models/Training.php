<?php

namespace App\Models;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;
    use Sluggable;

    // protected $guarded = ['id'];
    // protected $with = ['category'];

    // public function scopeFilter($query, array $filters) {

    //     // == callback function version ==
    //     $query->when($filters['category'] ?? false, function($query, $pelatihan) {
    //         return $query->whereHas('category', function($query) use ($pelatihan) {
    //                 $query->where('slug', $pelatihan);
    //         });
    //      });
    // }
    

    // public function category() {
    //     return $this->belongsTo(TrainingCategories::class);
    // }    

    protected $guarded = ['id'];
    // protected $with = ['training_category'];
    // // protected $with = ['sertifikasi'];

    // public function scopeFilter($query, array $filters) {

    //     $query->when($filters['training_category'] ?? false, function($query, $training_category) {
    //         return $query->whereHas('training_category', function($query) use ($training_category) {
    //                 $query->where('slug', $training_category);
    //             });
    //         });
    
    //         // $query->when($filters['brochure'] ?? false, function($query, $brochure) {
    //         // return $query->whereHas('brochure', function($query) use ($brochure) {
    //         //             $query->where('slug', $brochure);
    //         //         });
    //         //     });
    // }
    

    // public function training_category() {
    //     return $this->belongsTo(TrainingCategories::class, 'training_categories_id');
    // }    

    // Sudah FIX MULAI DARI SINI

    // protected $with = ['trainingcategory'];
    // // protected $with = ['sertifikasi'];

    // public function scopeFilter($query, array $filters) {

    //     $query->when($filters['trainingcategory'] ?? false, function($query, $trainingcategory) {
    //         return $query->whereHas('trainingcategory', function($query) use ($trainingcategory) {
    //                 $query->where('slug', $trainingcategory);
    //             });
    //         });
    // }
    

    // public function trainingcategory() {
    //     return $this->belongsTo(TrainingCategories::class);
    // }  

    // SAMPAI SINI

    // protected $with = ['kategori'];
    protected $with = ['kategori'];
    // protected $with = ['sertifikasi'];

    public function scopeFilter($query, array $filters) {

        $query->when($filters['kategori'] ?? false, function($query, $training_categories) {
            return $query->whereHas('kategori', function($query) use ($training_categories) {
                    $query->where('slug', $training_categories);
                });
            });
    }
    

    public function kategori() {
        return $this->belongsTo(TrainingCategories::class, 'training_categories_id');
    }    

    public function schedule() {
        return $this->hasMany(Schedule::class);
    }

    public function kemnaker() {
        return $this->hasMany(KemnakerCertifications::class);
    }

    public function education() {
        return $this->hasMany(Education::class);
    }

    public function registrants() {
        return $this->hasMany(Registrants::class);
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

    // route model binding
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
