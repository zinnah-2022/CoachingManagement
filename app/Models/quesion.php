<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quesion extends Model
{
    use HasFactory;
    protected $fillable=['subject_id','quize_id','question','answer'];


    public function quize()
    {
        return $this->belongsTo(quize::class);
    }
    public function option()
    {
        return $this->hasMany(option::class)->inRandomOrder();
    }
}
