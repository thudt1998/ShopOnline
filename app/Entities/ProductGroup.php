<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProductGroup.
 *
 * @package namespace App\Entities;
 */
class ProductGroup extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'parent_id', 'name', 'description'];

    public function children()
    {
        return $this->hasMany(ProductGroup::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne(ProductGroup::class, 'id', 'parent_id');
    }

}
