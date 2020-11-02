<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReceptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lot_id' => 'bail|required|integer|exists:lots,id',
            'sequence' => 'required|string',
            'reception_started' => 'required|date',
            'reception_ended' => 'required|date',
            'workforce' => 'required|integer|gt:0',
            'supplier_id' => 'bail|required|integer|exists:suppliers,id',
            'supplier_name' => 'required|string',
            'boat_name' => 'required|string',
            'truck_number_plate'=> 'required|string',
            'species_id'=> 'required|integer',
            'origin_city_id'=> 'required|integer',
            'number_of_cases'=> 'required|integer|gt:0',
            'quantity_received'=> 'required|integer|gt:0',
            'quantity_weighted'=> 'required|integer|gt:0',
            'caliber_id'=> 'required|integer',
            'onp_ticket_serial'=> 'required|string',
            'status' => 'required|string|in:reception,production,tunnel,packing,storage'
        ];
    }
}
