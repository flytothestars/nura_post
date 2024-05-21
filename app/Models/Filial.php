<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Filial extends Model
{
    use HasFactory, AsSource;

    protected $fillable = ['address','phone','twogis_link','work_time','exchange_rates', 'city_id'];
}
