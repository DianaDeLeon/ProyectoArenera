<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailSale
 *
 * @property $id
 * @property $id_sale
 * @property $id_product
 * @property $price
 * @property $quantity
 * @property $subtotal
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @property Sale $sale
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetailSale extends Model
{
    
    static $rules = [
		'id_sale' => 'required',
		'id_product' => 'required',
		'price' => 'required',
		'quantity' => 'required',
		'subtotal' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_sale','id_product','price','quantity','subtotal'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'id_product');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sale()
    {
        return $this->hasOne('App\Models\Sale', 'id', 'id_sale');
    }
    

}
