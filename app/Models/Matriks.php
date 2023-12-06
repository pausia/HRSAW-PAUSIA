<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriks extends Model
{
    use HasFactory;
    protected $table = 'saw_evaluations';
    public function alternative()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternative');
    }

    // Relasi dengan Criterias
    public function criteria()
    {
        return $this->belongsTo(Bobot::class, 'id_criteria');
    }

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
