<?php

namespace App\Model;

use App\Model\Order;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\OrderDetail
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $product_id
 * @property int|null $seller_id
 * @property string|null $digital_file_after_sell
 * @property string|null $product_details
 * @property int $qty
 * @property float $price
 * @property float $tax
 * @property float $discount
 * @property string $delivery_status
 * @property string $payment_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $shipping_method_id
 * @property string|null $variant
 * @property string|null $variation
 * @property string|null $discount_type
 * @property int $is_stock_decreased
 * @property int $refund_request
 * @property-read \App\Model\Product|null $active_product
 * @property-read \App\Model\ShippingAddress|null $address
 * @property-read Order|null $order
 * @property-read \App\Model\Product|null $product
 * @property-read \App\Model\Seller|null $seller
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereDeliveryStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereDigitalFileAfterSell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereIsStockDecreased($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereProductDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereRefundRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereShippingMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereVariant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderDetail whereVariation($value)
 * @mixin \Eloquent
 */
class OrderDetail extends Model
{
    protected $casts = [
        'product_id' => 'integer',
        'order_id' => 'integer',
        'price' => 'float',
        'discount' => 'float',
        'qty' => 'integer',
        'tax' => 'float',
        'shipping_method_id' => 'integer',
        'seller_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'refund_request'=>'integer',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class)->where('status', 1);
    }

    public function active_product()
    {
        return $this->belongsTo(Product::class)->where('status', 1);
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function address()
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_address');
    }
}
