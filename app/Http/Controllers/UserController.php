<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;


class UserController extends Controller
{

    public function userBalance()
    {
        $oClient = new Services\JsonRpcClient();
        $aData = $oClient->send('userBalance', [
            'user_id' => 10
        ]);
        if (isset($aData['result']['balance'])) {
            return view('userBalance', ['balance' => $aData['result']['balance']]);
        } else {
            return  abort('404');
        }
    }
}
