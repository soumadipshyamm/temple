<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Webpatser\Uuid\Uuid;

class images extends Model
{
    use HasApiTokens, HasFactory;
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }
    protected $casts = [
        'meta_details' => array(),
    ];

    public function temple()
    {
        return $this->belongsTo(Temple::class, 'page_id');
    }

}
