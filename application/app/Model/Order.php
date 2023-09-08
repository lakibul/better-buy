<?php

namespace App\Model;

use App\User;
use Eloquent;
use Hoyvoy\CrossDatabase\Eloquent\Builder;
use Hoyvoy\CrossDatabase\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Model\Order
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string|null $customer_type
 * @property string $payment_status
 * @property string $order_status
 * @property string|null $payment_method
 * @property string|null $transaction_ref
 * @property float $order_amount
 * @property string $is_pause
 * @property string|null $cause
 * @property int|null $shipping_address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float $discount_amount
 * @property string|null $discount_type
 * @property string|null $coupon_code
 * @property int $shipping_method_id
 * @property float $shipping_cost
 * @property string $order_group_id
 * @property string $verification_code
 * @property int|null $seller_id
 * @property string|null $seller_is
 * @property string|null $shipping_address_data
 * @property int|null $delivery_man_id
 * @property float $deliveryman_charge
 * @property string|null $expected_delivery_date
 * @property string|null $order_note
 * @property int|null $billing_address
 * @property string|null $billing_address_data
 * @property string $order_type
 * @property float $extra_discount
 * @property string|null $extra_discount_type
 * @property int $checked
 * @property string|null $shipping_type
 * @property string|null $delivery_type
 * @property string|null $delivery_service_name
 * @property string|null $third_party_delivery_tracking_id
 * @property-read ShippingAddress|null $billingAddress
 * @property-read User|null $customer
 * @property-read DeliveryMan|null $delivery_man
 * @property-read Review|null $delivery_man_review
 * @property-read Collection|OrderDetail[] $details
 * @property-read int|null $details_count
 * @property-read Seller|null $seller
 * @property-read OrderDetail|null $sellerName
 * @property-read ShippingMethod|null $shipping
 * @property-read ShippingAddress|null $shippingAddress
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereBillingAddress($value)
 * @method static Builder|Order whereBillingAddressData($value)
 * @method static Builder|Order whereCause($value)
 * @method static Builder|Order whereChecked($value)
 * @method static Builder|Order whereCouponCode($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereCustomerId($value)
 * @method static Builder|Order whereCustomerType($value)
 * @method static Builder|Order whereDeliveryManId($value)
 * @method static Builder|Order whereDeliveryServiceName($value)
 * @method static Builder|Order whereDeliveryType($value)
 * @method static Builder|Order whereDeliverymanCharge($value)
 * @method static Builder|Order whereDiscountAmount($value)
 * @method static Builder|Order whereDiscountType($value)
 * @method static Builder|Order whereExpectedDeliveryDate($value)
 * @method static Builder|Order whereExtraDiscount($value)
 * @method static Builder|Order whereExtraDiscountType($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereIsPause($value)
 * @method static Builder|Order whereOrderAmount($value)
 * @method static Builder|Order whereOrderGroupId($value)
 * @method static Builder|Order whereOrderNote($value)
 * @method static Builder|Order whereOrderStatus($value)
 * @method static Builder|Order whereOrderType($value)
 * @method static Builder|Order wherePaymentMethod($value)
 * @method static Builder|Order wherePaymentStatus($value)
 * @method static Builder|Order whereSellerId($value)
 * @method static Builder|Order whereSellerIs($value)
 * @method static Builder|Order whereShippingAddress($value)
 * @method static Builder|Order whereShippingAddressData($value)
 * @method static Builder|Order whereShippingCost($value)
 * @method static Builder|Order whereShippingMethodId($value)
 * @method static Builder|Order whereShippingType($value)
 * @method static Builder|Order whereThirdPartyDeliveryTrackingId($value)
 * @method static Builder|Order whereTransactionRef($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereVerificationCode($value)
 * @mixin Eloquent
 */
class Order extends Model
{
    protected $casts = [
        'order_amount' => 'float',
        'discount_amount' => 'float',
        'customer_id' => 'integer',
        'shipping_address' => 'integer',
        'shipping_cost' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'billing_address' => 'integer',
        'extra_discount' => 'float',
        'delivery_man_id' => 'integer',
        'shipping_method_id' => 'integer',
        'seller_id' => 'integer'
    ];

    public function details(): HasMany
    {
        return $this->hasMany(OrderDetail::class)->orderBy('seller_id', 'ASC');
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    public function sellerName(): HasOne
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function shipping(): BelongsTo
    {
        return $this->belongsTo(ShippingMethod::class, 'shipping_method_id');
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_address');
    }

    public function billingAddress(): BelongsTo
    {
        return $this->belongsTo(ShippingAddress::class, 'billing_address');
    }

    public function delivery_man(): BelongsTo
    {
        return $this->belongsTo(DeliveryMan::class, 'delivery_man_id');
    }

    public function delivery_man_review(): HasOne
    {
        return $this->hasOne(Review::class, 'order_id');
    }
}
