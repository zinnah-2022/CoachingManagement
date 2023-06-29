<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quize extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function quesion()
    {
        return $this->hasMany(quesion::class);
    }
}
