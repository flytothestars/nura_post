<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class TrackCode extends Model
{
    use HasFactory, AsSource;

    protected $fillable = ['code', 'status_track_code_id'];

}
