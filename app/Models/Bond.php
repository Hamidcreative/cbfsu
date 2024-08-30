<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{
    use HasFactory;
    protected $table    = 'bonds';
    protected $fillable = [
        'customer_id',
        'owner_name',
        'owner_state',
        'owner_city',
        'owner_zip',
        'owner_address',
        'owner_bid_date',
        'job_description',
        'job_location',
        'bid_start_date',
        'bid_completion_date',
        'bid_amount',
        'bid_project_cost',
        'bid_amount_percentage',
        'bid_warranty_period',
        'bid_damages',
        'pb_contract_date',
        'pb_contract_amount',
        'pb_estimated_profit',
        'pb_start_date',
        'pb_completion_date',
        'pb_warranty_period',
        'pb_damages',
        'is_subcontracted',
        'attachment',
        'status',

    ];
    public function subcontractors(){
        return $this->hasMany(SubContractor::class,'bond_id');
    }

}