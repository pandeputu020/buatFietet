<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datatunggal extends Model
{
    use HasFactory;

    protected $fillable = [
        'skor',
    ];
    public function datadistribusifs()
    {
        return $this->hasMany(Datadistribusif::class);
    }

}
