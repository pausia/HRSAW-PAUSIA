<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SawAlternativeResult extends Model
{
    use HasFactory;
    protected $table = 'saw_alternatives_results';
    protected $fillable = [
        'user_id', 
        'id_alternative',
        'total_value',
        'ranking',
    ];

    public function alternative()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternative');
    }
}
