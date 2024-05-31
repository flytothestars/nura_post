<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;

class TrackCode extends Model
{
    use HasFactory, AsSource;

    protected $fillable = ['code', 'status_track_code_id'];

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusTrackCode::class, 'status_track_code_id');
    }
}
