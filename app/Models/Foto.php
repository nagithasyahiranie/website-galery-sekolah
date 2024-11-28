<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto';
    protected $fillable = [
        'judul',
        'file',
        'galery_id'
    ];

    public function galery()
    {
        return $this->belongsTo(Galery::class, 'galery_id', 'id'); // Galery adalah model yang berelasi dengan Foto
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}

