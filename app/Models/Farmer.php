<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Farmer extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory, SoftDeletes;

    public function thlai_thars()
    {
        return $this->hasMany(ThlaiThar::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function village_council()
    {
        return $this->belongsTo(User::class, 'vc_id');
    }
}
