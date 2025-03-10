<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function ad() {
        return $this->belongsTo(Ad::class, 'ad_id');
    }
    public function education() {
        return $this->belongsTo(Education::class);
    }   

    public function staff() {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    // route model binding
    public function getRouteKeyName()
    {
        return 'slugClients';
    }

    public function sluggable(): array
    {
        return [
            'slugClients' => [
                'source' => 'name'
            ]
        ];
    }
}
