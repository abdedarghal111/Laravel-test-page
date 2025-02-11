<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cortos extends Model
{
    use HasFactory;

    public function usuario(){
        //return $this->belongsTo(User::class, "user_id", "id");
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function director(){
        return $this->belongsTo(Directores::class, "director_id", "id");
    }
}
