<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['facilities_id', 'unit_id', 'image', 'title','category','id'];

    public static function createID()
    {
        while(true){
            $id = Str::uuid();
            $check = Gallery::find($id);
            if(!$check) return $id;
            else continue;
        }

    }

    // RELATION
    public function facilities()
    {
        return $this->belongsTo(Facilities::class,'id','facilities_id');
    }
    
    public function unit()
    {
        return $this->belongsTo(Unit::class,'id','unit_id');
    }
}
