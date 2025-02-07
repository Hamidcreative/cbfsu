<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'questions';
     protected $fillable    =   [
         'question',
         'customer_id',
         'answer'
     ];
}
