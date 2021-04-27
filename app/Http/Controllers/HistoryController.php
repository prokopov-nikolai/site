<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;


class HistoryController extends Controller
{
    public function history()
    {
        $oClient = new Services\JsonRpcClient();
        $aData = $oClient->send('history', [
            'limit' => 50
        ]);
        if (isset($aData['result']['history']) && is_array($aData['result']['history'])) {
            return view('history', ['history' => $aData['result']['history']]);
        } else {
            return  abort('404');
        }
    }
}
