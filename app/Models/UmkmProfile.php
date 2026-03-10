<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmkmProfile extends Model
{
    //
    protected $table = 'umkm_profile'; // Deklarasi nama tabel karena singular

    protected $fillable = [
        'idUsers',
        'name',
        'jenisUsaha',
        'nib',
        'phone',
        'alamat',
    ];

    // Relasi Inverse ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'idUsers', 'id');
    }
}
