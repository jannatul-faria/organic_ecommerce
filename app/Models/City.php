<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country_id',
        'state_id',
        'status',
    ];
    public function country():BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function state():BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
