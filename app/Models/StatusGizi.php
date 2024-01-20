<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusGizi extends Model
{
    use HasFactory;

    protected $table = 'status_gizi';

    protected $fillable = ['user_id', 'tanggal_cek', 'tinggi_badan', 'berat_badan', 'imt', 'hasil_status_gizi', 'z_score'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'foreign_key', '   user_id');
    }
}
