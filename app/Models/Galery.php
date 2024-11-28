<?php

/// app/Models/Galery.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Galery extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi
    protected $table = 'galery'; 

    // Daftar kolom yang dapat diisi
    protected $fillable = [
        'post_id',
        'position',
        'status'
    ];

    public function foto()
    {
        return $this->hasMany(Foto::class, 'galery_id', 'id'); // Relasi one-to-many dengan Foto
    }

    /**
     * Get the post that owns the gallery
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}