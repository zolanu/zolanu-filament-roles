<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farmer extends Model
{
    use HasFactory, SoftDeletes;

    public function thlai_thars()
    {
        return $this->hasMany(ThlaiThar::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
