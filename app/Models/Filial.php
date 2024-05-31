<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;

class Filial extends Model
{
    use HasFactory, AsSource;

    protected $fillable = ['address','phone','twogis_link','start_time', 'end_time','exchange_rates', 'city_id'];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }


}
