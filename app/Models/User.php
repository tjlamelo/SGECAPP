<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Enum\Role;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'structure_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => Role::class,
    ];
 
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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
    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }
    public function detail()
    {
        return $this->hasOne(UserDetail::class, 'personne_id'); // Assure-toi que 'personne_id' est la bonne FK
    }
  
       public function userDetail()
    {
        return $this->hasOne(UserDetail::class, 'personne_id');
    }
}
