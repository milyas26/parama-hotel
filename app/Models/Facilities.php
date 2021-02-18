<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Facilities extends Model
{
    use HasFactory;

    protected $table = 'facilities';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'gallery_id', 'title', 'description', 'id'
    ];

    public static function createID()
    {
        while(true){
            $id = Str::uuid();
            $check = Facilities::find($id);
            if(!$check) return $id;
            else continue;
        }

    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class,'facilities_id','id');
    }
}
