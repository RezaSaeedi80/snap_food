<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PermissionController extends Controller
{

    /**
     * show list of sellers
     *
     * @return \Illuminate\Http\Response
     */

    public function sellers()
    {
        $sellers = User::role('seller')->paginate(3);
        return view('Admin.addPermission', compact('sellers'));
    }

    public function addPermission(Request $request, User $user)
    {
        if ($user->givePermissionTo($request->permission)) {
            return response()->json([
                'result' => true
            ]);
        }
        return response()->json([
            'result' => false
        ]);
    }
    public function revokePermission(Request $request, User $user)
    {
        if ($user->revokePermissionTo($request->permission)) {
            return response()->json([
                'result' => true
            ]);
        }
        return response()->json([
            'result' => false
        ]);
    }
}
