<?php

namespace App\Models\Models;

use App\Models\User;
use App\Models\Models\messages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class conversations extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function message()
    {
        return $this->hasMany(messages::class,'conversation_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class);
    }
    public function receiver()
    {
        return $this->belongsTo(User::class);
    }
}
