<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indemnity extends Model
{
    use HasFactory;
    protected $table='customers_indemnities';
    protected $fillable=[
        'customer_id',
        'corporate',
        'personal',
    ];
}
