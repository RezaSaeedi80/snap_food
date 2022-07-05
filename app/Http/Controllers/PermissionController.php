<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        // dd($sellers);
        return view('Admin.addPermission', compact('sellers'));
    }
}
