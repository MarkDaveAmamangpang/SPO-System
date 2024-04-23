<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

protected $fillable = [
    'event',
    'sportstype',
    'placing',
    'user_id', 
];

public function user()
{
    return $this->belongsTo(User::class);
}

public function getEvent()
{
    return $this->event;

}

public function getSportstype()
{
    return $this->sportstype;
}

public function getPlacing()
{
    return $this->placing;
}
}
