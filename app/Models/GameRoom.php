<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameRoom extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'created_by', 'is_online'];

    public function config()
    {
        return $this->belongsTo(GameConfig::class, 'id', 'room_id');
    }
    public function specialites()
    {
        $config= [
            'id'=>$this->id,
            'slug'=>$this->slug,
            'created_by'=>$this->created_by
        ];
        return $config;
    }
}
