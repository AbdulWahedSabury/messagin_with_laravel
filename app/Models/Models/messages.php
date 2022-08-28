<?php

namespace App\Models\Models;

use App\Models\User;
use App\Models\Models\conversations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class messages extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function conversation()
    {
        return $this->belongsTo(conversations::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
