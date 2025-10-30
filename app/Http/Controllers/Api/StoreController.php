<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;


use App\Settings\SocialSettings;
use App\Settings\StoreSettings;
use Illuminate\Http\Request;

/**
 * @group SubscribeUs
 **/
class StoreController extends Controller
{
    public function index(Request $request)
    {

        $setting['social'] = (new StoreSettings)->toArray();

        return response()->json($setting);
    }
}
