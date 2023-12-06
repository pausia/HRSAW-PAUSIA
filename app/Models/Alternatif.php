<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = 'saw_alternatives';
    protected $fillable = [
        'name',
        'user_id',
    ];
    public function evaluations()
    {
        return $this->hasMany(Matriks::class, 'id_alternative');
    }

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
