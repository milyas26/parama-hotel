<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'image', 'floor', 'unit', 'large','id'];
    protected $table = 'units';
    protected $keyType = 'string';
    public $incrementing = false;

    public static function createID()
    {
        while(true){
            $id = Str::uuid();
            $check = Unit::find($id);
            if(!$check) return $id;
            else continue;
        }

    }
}
