<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $table = "urls";
    protected $fillable = [
        'url',
        'zametka_id'
    ];

    public function zametka()
    {
        return $this->belongsTo(Zametka::class, foreignKey:"zametka_id", ownerKey:"id");
    } 
}
