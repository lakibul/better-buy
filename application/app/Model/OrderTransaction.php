<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\OrderTransaction
 *
 * @property int $seller_id
 * @property int $order_id
 * @property string $order_amount
 * @property string $seller_amount
 * @property string $admin_commission
 * @property string $received_by
 * @property string|null $status
 * @property string $delivery_charge
 * @property string $tax
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $customer_id
 * @property string|null $seller_is
 * @property string $delivered_by
 * @property string|null $payment_method
 * @property string|null $transaction_id
 * @property int $id
 * @property-read User|null $customer
 * @property-read \App\Model\Seller|null $seller
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereAdminCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereDeliveredBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereDeliveryCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereOrderAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereReceivedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereSellerAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereSellerIs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderTransaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderTransaction extends Model
{
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
