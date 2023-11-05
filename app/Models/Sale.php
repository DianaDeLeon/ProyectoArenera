<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 *
 * @property $id
 * @property $date
 * @property $id_costumer
 * @property $id_user
 * @property $total
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Costumer $costumer
 * @property DetailSale[] $detailSales
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sale extends Model
{
    
    static $rules = [
		'date' => 'required',
		'id_costumer' => 'required',
		'id_user' => 'required',
		'total' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','id_costumer','id_user','total','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function costumer()
    {
        return $this->hasOne('App\Models\Costumer', 'id', 'id_costumer');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailSales()
    {
        return $this->hasMany('App\Models\DetailSale', 'id_sale', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
    

}
