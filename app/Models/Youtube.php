<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'url_thumbnail', 'url'];
    protected $table = 'youtubes';
}
