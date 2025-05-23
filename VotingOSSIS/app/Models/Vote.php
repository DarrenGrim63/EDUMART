<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['user_id', 'candidate_id'];

public function candidate() {
    return $this->belongsTo(Candidate::class);
}

public function user() {
    return $this->belongsTo(User::class);
}

}
