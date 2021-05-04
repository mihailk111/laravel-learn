<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zametka extends Model
{
    use HasFactory;

    protected $table = "zametki";
    protected $fillable = [
        'title',
        'text'
    ];
    public function urls()
    {
        return $this->hasMany(Url::class, foreignKey:"zametka_id", localKey:"id");
    }        

}
