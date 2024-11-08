<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyUserPosition extends Model
{
        // Tentukan nama tabel jika tidak mengikuti konvensi Laravel
        protected $table = 'company_user_positions';

        // Tentukan kolom yang dapat diisi (mass assignable)
        protected $fillable = [
            'user_id',
            'company_id',
            'position_id',
            'assigned_at',
        ];

        /**
         * Relasi ke model User
         *
         * @return BelongsTo
         */
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        /**
         * Relasi ke model Company
         *
         * @return BelongsTo
         */
        public function company(): BelongsTo
        {
            return $this->belongsTo(Company::class);
        }

        /**
         * Relasi ke model Position
         *
         * @return BelongsTo
         */
        public function position(): BelongsTo
        {
            return $this->belongsTo(Position::class);
        }
}
