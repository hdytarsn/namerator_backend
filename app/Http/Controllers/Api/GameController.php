<?php

namespace App\Http\Controllers\Api;

use App\Events\GameActionBroadcast;
use App\Events\StartGame;
use App\Http\Controllers\Controller;
use App\Models\GameRoom;
use App\Models\GameAction;
use App\Models\TrName;
use App\Models\EngName;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function startGame(Request $request)
    {
        $room = GameRoom::query()->where(['slug' => $request->slug])->firstOrFail();
        if ($request->user()->id === $room->created_by) {
            $room->update(['is_game_start' => 1]);
            broadcast(new StartGame($request->slug));
            return response()->json([
                'status' => 'game started at room ' . $room->slug, 200
            ]);
        }
        return response()->json([
            'status' => 'user not the room creator' . $room->slug, 433
        ]);
    }

    public function createAction(Request $request)
    {
        $entryName = toLowerCase($request->entryName);
        $pastName=toLowerCase($request->pastName);
        $room = GameRoom::query()->where(['slug' => $request->slug])->firstOrFail();
        $result = $this->getPointAndStatusByRoomConfig($room, $entryName,$pastName);

        $newGameAction = GameAction::create([
            'room_id' => $room->id,
            'user_id' => $request->user()->id,
            'entry_name' => $entryName,
            'status' => $result['status'],
            'point' => $result['point']
        ]);
        broadcast(new GameActionBroadcast($request->user(), $request->slug, $entryName, $result['point'], $result['status']));
        return ['result' => $newGameAction];
    }

    function getPointAndStatusByRoomConfig($room, $entryName,$pastName)
    {
        $roomConfig = $room->config;
        return  $this->calculatePointByLevel(
            $this->isValidName($entryName, $roomConfig->speech_lang),
            $this->isNameUsedRoomBefore($entryName, $room->id),
            $this->isMatchLastChars($entryName,$pastName),
            $roomConfig->level,
            $entryName
        );
    }
    function isValidName($entryName, $speechLangId)
    {
        if (!$entryName) {
            return false;
        }
        if ($speechLangId == 1) {
            $nameCountOnDb = TrName::query()->where('name', $entryName)->count();
        } else {
            $nameCountOnDb = EngName::query()->where('name', $entryName)->count();
        }

        return $nameCountOnDb > 0 ? true : false;
    }
    function isNameUsedRoomBefore($entryName, $roomId)
    {
        $entryCount = GameAction::query()->where(['room_id' => $roomId, 'entry_name' => $entryName])->count();
        return $entryCount > 0 ? true : false;
    }
    function isMatchLastChars($entryName, $pastName)
    {
        if(!$pastName){
            return true;
        }
        return substr(toLowerCase($pastName), -1)==substr(toLowerCase($entryName), 0,1) &&$entryName ?true : false;

    }
    function calculatePointByLevel($isValidName, $isNameUsedBefore,$isMatchLastChars, $level, $entryName)
    {
        $point = 0;
        $status = "";
        if (!$isValidName) {
            $status .= "Geçerli bir isim değil! ";
        }
        elseif ($isNameUsedBefore) {
            $status .= "Bu isim daha önce kullanıldı! ";
        }
        elseif(!$isMatchLastChars){
            $status .= "İlk karakter uygun değil! ";
        }else{
$point=30;
        }
        $entryName ? "" : $status = 'Cevap verilmedi!';
        $status ? "" : $status = "Geçerli!";
        return ['point' => $point, 'status' => $status];
    }
}
