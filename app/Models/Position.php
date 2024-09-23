<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi dengan companies melalui tabel pivot (company_user)
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_user')
                    ->withPivot('user_id')
                    ->withTimestamps();
    }

    // Relasi dengan users melalui tabel pivot (company_user)
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user')
                    ->withPivot('company_id')
                    ->withTimestamps();
    }
}
