<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'admin';
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    // Implement required methods from Authenticatable interface
    public function getAuthIdentifierName()
    {
        return 'email'; // Or the field you use for authentication (e.g., email)
    }

    public function getAuthIdentifier()
    {
        return $this->email; // Or the attribute used for authentication
    }

    public function getAuthPassword()
    {
        return $this->password; // Assuming you have a password field
    }

    public function getAuthPasswordName() // Ensure this is defined
    {
        return 'password'; // Assuming you use 'password' field for authentication
    }


    public function getRememberToken()
    {
        return $this->remember_token; 
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
    public function getRememberTokenName() // Newly added method
    {
        return 'remember_token'; // Assuming you have a 'remember_token' field
    }
    // Password hashing (already implemented)
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
