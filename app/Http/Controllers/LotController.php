<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Lot;

class LotController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getLot(Request $request){

        if(! $lot = Lot::find($request->id)){
            return response()->json(['success' => false, 'errors' => [['lot_not_found' => 'Ce lot n\'existe pas']]]);
        }
        return response()->json(compact('lot'));
    }
}
