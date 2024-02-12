<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class Temple extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
        self::deleting(function ($query) {
            $query->personalDetail()->delete();
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
    public function city()
    {
        return $this->belongsTo(Citie::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function banner()
    {
        return $this->hasMany(Banner::class, 'temple_id');
    }

    public function puja()
    {
        return $this->hasMany(Puja::class);
    }
    public function darshanTime()
    {
        return $this->hasMany(DarshanTime::class, 'temple_id');
    }
    public function sliderImg()
    {
        return $this->hasMany(images::class, 'page_id');
    }
    public function donation()
    {
        return $this->hasMany(Donation::class, 'temple_id');
    }
}
