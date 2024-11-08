<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'company_id',
    ];

    public function company()
{
    return $this->belongsTo(Company::class);
}

public function assignments()
{
    return $this->hasOne(TaskAssignment::class);
}
}
