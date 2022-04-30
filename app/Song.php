<?php

namespace App;
use App\Traits\ModelHistoryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory, ModelHistoryTrait;

    public static function boot()
    {
        parent::boot();

        self::saveModelHistory();
    }
}
