<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;
    protected $table = 'signatures';
    protected $fillable = [
        'name',
        'attachment_type',
        'attachment',
        'bond_id',
    ];
     public function bond(){
         return $this->belongsTo(Bond::class,'bond_id');
     }
}
