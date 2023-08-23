<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsvData extends Model
{
    use HasFactory;

    protected $table = 'csv_data';
    protected $guarded = [
        'id',
    ];


    public function scopeFilterSearchQuery($query)
    {
        return $query->when(!empty(request()->name), function ($query) {
            $query->where('name', 'LIKE', request()->name . '%');
        })
            ->when((!empty(request()->price_min) || !empty(request()->price_max)), function ($query) {
                if (!empty(request()->price_min) && !empty(request()->price_max)) {
                    $query->whereBetween('price', [request()->price_min, request()->price_max]);
                } elseif (!empty(request()->price_min)) {
                    $query->where('price', '>=', request()->price_min);
                } elseif (!empty(request()->price_max)) {
                    $query->where('price', '<=', request()->price_max);
                }
            })
            ->when(!empty(request()->bedrooms), function ($query) {
                $query->where('bedrooms', '=', request()->bedrooms);
            })
            ->when(!empty(request()->bathrooms), function ($query) {
                $query->where('bathrooms', '=', request()->bathrooms);
            })
            ->when(!empty(request()->storeys), function ($query) {
                $query->where('storeys', '=', request()->storeys);
            })
            ->when(!empty(request()->garages), function ($query) {
                $query->where('garages', '=', request()->garages);
            });
    }
}
