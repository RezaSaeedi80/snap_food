<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AddressStoreRequest;
use App\Http\Requests\API\UpdateAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AddressUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'addresses' => AddressResource::collection(auth()->user()->addresses)
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressStoreRequest $request)
    {
        if (auth()->user()->addresses()->create($request->validated())) {
            return response()->json([
                'msg' => 'address added successfully',
            ]);
        }
        return response()->json([
            'error' => 'add address faild',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        if ($address->update($request->validated())) {
            return [
                'msg' => 'address successfully updated',
            ];
        }
        return [
            'msg' => 'faild',
        ];
    }


    /**
     * Update the specified collumn (current_address)
     * for specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function setCurrentAddress(Request $request, Address $address)
    {
        if (auth()->user()->id !== $address->addressable_id) {
            abort(403);
        }
        foreach (auth()->user()->addresses as $key => $address_another) {
            $address_another->update(['current_address' => false]);
        }
        if ($address->update(['current_address' => true])) {
            if (!auth()->user()->hasPermissionTo('can buy')) {
                auth()->user()->givePermissionTo('can buy');
            }
            return [
                'msg' => 'This address was selected as the current address.'
            ];
        }
        return [
            'msg' => 'faild',
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
