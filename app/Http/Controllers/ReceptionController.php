<?php

namespace App\Http\Controllers;

use App\Models\Reception;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReceptionRequest;
use \Spatie\Permission\Exceptions\UnauthorizedException;


class ReceptionController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasPermissionTo('show reception', 'api'))
            return response()->json(Reception::all()->take(50), 200);
        
        throw new UnauthorizedException(0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReceptionRequest $request)
    {
        if(auth()->user()->hasPermissionTo('create reception', 'api')){
            $validated = $request->validated();
            $reception = Reception::create($request->all());
            return response()->json($reception, 201);
        }
        throw new UnauthorizedException(0);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function show(Reception $reception)
    {
        if(auth()->user()->hasPermissionTo('show reception', 'api'))
            return response()->json($reception, 200);

        throw new UnauthorizedException(0);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function edit(Reception $reception)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReceptionRequest $request, Reception $reception)
    {
        if(auth()->user()->hasPermissionTo('update reception', 'api')){
            $validated = $request->validated();
            $reception->update($request->all());
            return response()->json($reception, 200);
        }
        throw new UnauthorizedException(0);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reception $reception)
    {
        if(auth()->user()->hasPermissionTo('show reception', 'api')){
            $reception->delete();
            return response()->json(null, 204);
        }
        throw new UnauthorizedException(0);
    }
}
