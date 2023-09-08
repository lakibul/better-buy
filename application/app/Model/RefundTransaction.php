<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\RefundTransaction
 *
 * @property int $id
 * @property int|null $order_id
 * @property string|null $payment_for
 * @property int|null $payer_id
 * @property int|null $payment_receiver_id
 * @property string|null $paid_by
 * @property string|null $paid_to
 * @property string|null $payment_method
 * @property string|null $payment_status
 * @property float|null $amount
 * @property string|null $transaction_type
 * @property int|null $order_details_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $refund_id
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction whereOrderDetailsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction wherePaidBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction wherePaidTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction wherePayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction wherePaymentFor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction wherePaymentReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction whereRefundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction whereTransactionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundTransaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RefundTransaction extends Model
{
    use HasFactory;
    protected $connection = 'mysql';

    protected $casts = [
        'order_id' => 'integer',
        'payment_for'=>'string',
        'payer_id' => 'integer',
        'payment_receiver_id' => 'integer',
        'paid_by'=>'string',
        'paid_to'=>'string',
        'payment_method'=>'string',
        'payment_status'=>'string',
        'order_details_id' => 'integer',
        'amount' => 'float',
        'transaction_type'=>'string',
        'refund_id'=>'string'

    ];
}
