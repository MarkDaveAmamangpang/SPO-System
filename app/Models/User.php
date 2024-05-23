<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'idnumber',
        'suffix',
        'sex',
        'user_type',
        'birthdate',
        'email',
        'password',
        'profile_picture',
        'lastlogin',
        'archived_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'birthdate' => 'datetime',
    ];

    protected $dates = ['archived_at', 'lastlogin'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getImageURL() {
        if($this->profile_picture) {
            return url('storage/' . $this->profile_picture);
        } else {
            return url('img/default.png');
        }
    }

    public function getProfileLink() {
        return route('dashboard', ['id' => $this->id]);
    }


    public function scopeArchived($query)
    {
        return $query->whereNotNull('archived_at');
    }

    public function scopeActive($query)
    {
        return $query->whereNull('archived_at');
    }

    public function archive()
    {
        $this->archived_at = now();
        $this->save();
    }

    public function unarchive()
    {
        $this->archived_at = null;
        $this->save();
    }

    public function isArchived()
{
    return !is_null($this->archived_at);
}

}
