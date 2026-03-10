<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SosialMedia extends Model
{
    //
    protected $table = 'sosial_media'; // Deklarasi nama tabel karena singular

    protected $fillable = [
        'idUsers',
        'name',
        'link',
    ];

    // Relasi Inverse ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'idUsers', 'id');
    }
}
