<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StoreResource;
use App\Models\Store;
use App\Models\SubscribeUs;
use Illuminate\Http\Request;

/**
 * @group SubscribeUs
 **/
class SubscribeUsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required_without:phone|email|unique:subscribe_us,email',
            'phone' => 'required_without:email|unique:subscribe_us,phone',
        ]);
        $tenant = $request->attributes->get('tenant', null);
        SubscribeUs::create(['tenant_id' => $tenant, 'email' => $request->get('email'), 'phone' => $request->get('phone')]);
        return response()->json(['message' => 'Subscribed successfully']);
    }
}
