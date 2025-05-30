<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Structure extends Model
{
    use HasFactory;

    
    protected $table = 'structures';
    protected $fillable = [
        'nom',
        'type',
        'code',
        'responsable_nom',
        'responsable_fonction',
        'adresse',
        'ville',
        'code_postal',
        'telephone',
        'email',
        'actif'
    ];

    public function users()
{
    return $this->hasMany(User::class);
}

    public $timestamps = true;
}