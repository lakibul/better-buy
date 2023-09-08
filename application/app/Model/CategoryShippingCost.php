<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\CategoryShippingCost
 *
 * @property int $id
 * @property int|null $seller_id
 * @property int|null $category_id
 * @property float|null $cost
 * @property int|null $multiply_qty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryShippingCost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryShippingCost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryShippingCost query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryShippingCost whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryShippingCost whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryShippingCost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryShippingCost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryShippingCost whereMultiplyQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryShippingCost whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryShippingCost whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CategoryShippingCost extends Model
{
    use HasFactory;
    protected $casts = [
        'seller_id' => 'integer',
        'category_id' => 'integer',
        'cost'=>'float',
        'multiply_qty'=>'integer'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
