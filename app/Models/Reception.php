<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reception extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'lot_id',
        'sequence',
        'reception_started',
        'reception_ended',
        'workforce',
        'supplier_id',
        'supplier_name',
        'boat_name',
        'truck_number_plate',
        'species_id',
        'origin_city_id',
        'number_of_cases',
        'quantity_received',
        'quantity_weighted',
        'caliber_id',
        'onp_ticket_serial',
        'status'
    ];

}
