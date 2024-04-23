<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    protected $fillable = ['username', 'email', 'password'];


    public function getImageURL() {
        return asset('storage/' . $this->profile_picture);
    }

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }



}
