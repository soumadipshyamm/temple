<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class LiveStreaming extends Model
{
    use HasFactory;
    // use CascadesDeletes;

    // protected $cascadeDeletes = ['temple'];
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
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

    public function temple()
    {
        return $this->belongsTo(Temple::class, 'temple_id');
    }
    public function puja()
    {
        return $this->belongsTo(Puja::class, 'puja_id');
    }
}
