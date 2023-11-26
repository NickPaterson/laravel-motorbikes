<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Motorbike;

class Category extends Model
{
    use HasFactory;

    public function motorbikes()
    {
        return $this->hasMany(Motorbike::class);
    }
}
