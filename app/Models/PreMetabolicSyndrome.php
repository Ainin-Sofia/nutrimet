<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreMetabolicSyndrome extends Model
{
    use HasFactory;

    protected $table = 'pre_metabolic_syndrome';

    protected $fillable = ['user_id', 'tanggal_cek', 'sistole', 'diastole', 'lingkar_pinggang', 'gula_darah', 'hdl', 'trigliserida', 'hasil_pms'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key', 'user_id');
    }
}
