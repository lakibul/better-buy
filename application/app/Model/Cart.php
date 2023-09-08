<?php

namespace App\Model;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Model\Cart
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string|null $cart_group_id
 * @property int|null $product_id
 * @property string $product_type
 * @property string|null $digital_product_type
 * @property string|null $color
 * @property string|null $choices
 * @property string|null $variations
 * @property string|null $variant
 * @property int $quantity
 * @property float $price
 * @property float $tax
 * @property float $discount
 * @property string|null $slug
 * @property string|null $name
 * @property string|null $thumbnail
 * @property int|null $seller_id
 * @property string $seller_is
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $shop_info
 * @property float|null $shipping_cost
 * @property string|null $shipping_type
 * @property-read CartShipping|null $cart_shipping
 * @property-read Product|null $product
 * @method static Builder|Cart newModelQuery()
 * @method static Builder|Cart newQuery()
 * @method static Builder|Cart query()
 * @method static Builder|Cart whereCartGroupId($value)
 * @method static Builder|Cart whereChoices($value)
 * @method static Builder|Cart whereColor($value)
 * @method static Builder|Cart whereCreatedAt($value)
 * @method static Builder|Cart whereCustomerId($value)
 * @method static Builder|Cart whereDigitalProductType($value)
 * @method static Builder|Cart whereDiscount($value)
 * @method static Builder|Cart whereId($value)
 * @method static Builder|Cart whereName($value)
 * @method static Builder|Cart wherePrice($value)
 * @method static Builder|Cart whereProductId($value)
 * @method static Builder|Cart whereProductType($value)
 * @method static Builder|Cart whereQuantity($value)
 * @method static Builder|Cart whereSellerId($value)
 * @method static Builder|Cart whereSellerIs($value)
 * @method static Builder|Cart whereShippingCost($value)
 * @method static Builder|Cart whereShippingType($value)
 * @method static Builder|Cart whereShopInfo($value)
 * @method static Builder|Cart whereSlug($value)
 * @method static Builder|Cart whereTax($value)
 * @method static Builder|Cart whereThumbnail($value)
 * @method static Builder|Cart whereUpdatedAt($value)
 * @method static Builder|Cart whereVariant($value)
 * @method static Builder|Cart whereVariations($value)
 * @mixin Eloquent
 */
class Cart extends Model
{

    protected $casts = [
        'price' => 'float',
        'discount' => 'float',
        'tax' => 'float',
        'seller_id' => 'integer',
        'quantity' => 'integer',
        'shipping_cost'=>'float'
    ];

    public function cart_shipping(): HasOne
    {
        return $this->hasOne(CartShipping::class,'cart_group_id','cart_group_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id')->where('status', 1);
    }

}
