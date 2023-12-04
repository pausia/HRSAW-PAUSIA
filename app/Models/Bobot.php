<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    use HasFactory;
    protected $table = 'saw_criterias';
    protected $fillable = [
        'criteria',
        'weight',
        'attribute',
    ];
}
