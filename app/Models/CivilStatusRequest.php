<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CivilStatusRequest extends Model
{
    protected $fillable = [
        'user_id', 'acte_type', 'documents_ids', 'status', 'rejection_reason',
    ];

    protected $casts = [
        'documents_ids' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
 

  
    public function userDetail()
{
    return $this->belongsTo(UserDetail::class, 'user_detail_id');
}

}
