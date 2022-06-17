<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class appointments extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $casts = [
        'date'=>'datetime',
        'time'=>'datetime',
        'members'=>'array'
    ];
    public function Client()
    {
        return $this->belongsTo(client::class);
    }
    public function getStatusState()
    {
        $state = [
            'SCHEDULED'=>'primary',
            'CLOSED'=>'success',
        ];
        return $state[$this->status];
    }
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->ToFormattedData();
    }
    public function getTimeAttribute($value)
    {
        return Carbon::parse($value)->ToFormattedTime();
    }
}
