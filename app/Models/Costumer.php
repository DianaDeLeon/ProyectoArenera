<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Costumer
 *
 * @property $id
 * @property $first_name
 * @property $last_name
 * @property $phone_number
 * @property $nit
 * @property $adress
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Sale[] $sales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Costumer extends Model
{
    
    static $rules = [
		'first_name' => 'required',
		'last_name' => 'required',
		'phone_number' => 'required',
		'adress' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name','phone_number','nit','adress','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'id_costumer', 'id');
    }
    

}
