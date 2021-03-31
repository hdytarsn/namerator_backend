<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GameConfig;
use App\Models\GameRoom;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GameRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    public function createRoom(Request $request)
    {
        $user = $request->user();

        $newRoom = GameRoom::create([
            'slug' => generateString(6),
            'created_by' => $user->id,
            'is_online' => 1,
        ]);
        $roomConfig = $this->createConfig($newRoom->id, $request->gameSettings);
        return response()->json(['slug' => $newRoom->slug, 'id' => $newRoom->id, 'roomConfig' => $roomConfig], 200);
    }

    public function createConfig($roomId, $roomConfig)
    {
        try {
            $roomConfig = json_decode($roomConfig);
            $newRoomConfig = GameConfig::create([
                'room_id' => $roomId,
                'speech_lang' => $roomConfig->languageId,
                'level' => $roomConfig->levelId,
                'game_type' => $roomConfig->multiplayer ? 2 : 1
            ]);
            if ($roomConfig->id) {
                return $newRoomConfig;
            } else {
                throw new Exception("Error while creating gameConfig!");
            }
        } catch (Exception $e) {
            return $e;
        }
    }
    public function getConfig($slug)
    {
        $room = GameRoom::query()->where(['slug' => $slug])->firstOrFail();
        return response()->json([
            'config' => $room->config->specialites(),
            'room' => $room->specialites(), 200
        ]);
    }

}
