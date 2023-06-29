<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classnote extends Model
{
    use HasFactory;
    protected $fillable=['subject_id', 'quize_id','title','body'];

    public function quize(){
        return $this->belongsTo(quize::class);
    }
    public function subject(){
        return $this->belongsTo(subject::class);
    }
}
