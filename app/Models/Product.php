<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $description
 * @property $unit_of_measurement
 * @property $price
 * @property $image
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property DetailSale[] $detailSales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    static $rules = [
		'description' => 'required',
		'unit_of_measurement' => 'required',
		'price' => 'required',
		'image' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['description','unit_of_measurement','price','image','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailSales()
    {
        return $this->hasMany('App\Models\DetailSale', 'id_product', 'id');
    }
    

}
