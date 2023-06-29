<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    use HasFactory;
    protected $fillable=['quesion_id', 'option'];

    public function quesion(){

        return $this->belongsTo(quesion::class);
    }
}
