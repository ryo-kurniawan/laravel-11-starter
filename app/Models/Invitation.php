<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'email', 'invited_by', 'status', 'position_id'];

    // Relasi dengan company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relasi dengan user yang mengundang
    public function inviter()
    {
        return $this->belongsTo(User::class, 'invited_by');
    }

    // Relasi dengan posisi (jika digunakan)
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
