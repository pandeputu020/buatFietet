<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasitribusif extends Model
{
    use HasFactory;

    protected $fillable = [
        'skor',
        'frekuensi',
    ];
    public function datatunggal()
    {
        return $this->belongsTo(Datatunggal::class);
    }

}
