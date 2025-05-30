<?php
// app/Models/UserDocument.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDocument extends Model
{
    use HasFactory, SoftDeletes;
protected $casts = [
    'issue_date' => 'datetime',
    'expiry_date' => 'datetime',
    'verified_at' => 'datetime',
];

    protected $fillable = [
        'user_detail_id',
        'document_type',
        'document_number',
        'issue_date',
        'expiry_date',
        'issuing_authority',
        'front_path',
        'back_path',
        'mime_type',
        'file_size',
        'file_hash',
        'verification_status',
        'rejection_reason',
        'verified_by',
        'verified_at',
    ];

    public function userDetail()
    {
        return $this->belongsTo(UserDetail::class);
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
