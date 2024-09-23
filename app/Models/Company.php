<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'owner_id',
    ];

    // Relasi dengan owner (user yang memiliki company)
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // Relasi dengan user lain (many-to-many)
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user')
                    ->withPivot('position_id')
                    ->withTimestamps();
    }

    // Relasi dengan posisi
    public function positions()
    {
        return $this->belongsToMany(Position::class, 'company_user')
                    ->withPivot('user_id')
                    ->withTimestamps();
    }
}
