<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'user_id',
        'account_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function scopeIsAdmin()
    {
        return $this->account_type == 1;
    }

    public function getName()
    {
        if ($this->account_type == 1) {
            return Doctor::find($this->user_id)->name;
        } elseif ( $this->account_type == 2) {
            return Students::find($this->user_id)->name;
        }

        return Faculties::find($this->user_id)->name;
    }
}
