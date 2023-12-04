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
}
