<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\FlashDealProduct
 *
 * @property int $id
 * @property int|null $flash_deal_id
 * @property int|null $product_id
 * @property float $discount
 * @property string|null $discount_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereFlashDealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashDealProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FlashDealProduct extends Model
{

    protected $casts = [

        'product_id'    => 'integer',
        'discount'      => 'float',
        'flash_deal_id' => 'integer',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
