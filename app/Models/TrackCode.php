<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Orchid\Filters\Types\Where;

class TrackCode extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = ['code', 'status_track_code_id'];

    protected $allowedSorts = [
        'id', 'status_track_code_id'
    ];

    protected $allowedFilters = [
        'code' => Where::class        
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusTrackCode::class, 'status_track_code_id');
    }
}
