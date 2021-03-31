<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameConfig extends Model
{
    use HasFactory;
    protected $fillable=['room_id','speech_lang','level','game_type'];

    public function room()
    {
        return $this->belongsTo(GameRoom::class, 'room_id', 'id');
    }
    public function specialites()
    {
        $config= [
            'levelId'=>$this->level,
            'languageId'=>$this->speech_lang,
            'multiplayer'=>$this->game_type===2?true:false,
            'isGameStarted'=>$this->room->is_game_started?true:false
        ];
        return $config;
    }
    public function getPointWithStatus($entry_name){

    }
}
