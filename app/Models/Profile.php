<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

      // Definisikan nama tabel secara eksplisit
      protected $table = 'profile';  // Nama tabel yang benar adalah 'profiles'
      protected $fillable = [
          'judul',
          'isi',
          'created_at',
          'updated_at'
      ];
}