<?php

namespace App\Model;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Model\Transaction
 *
 * @property int $id
 * @property int|null $order_id
 * @property string|null $payment_for
 * @property int|null $payer_id
 * @property int|null $payment_receiver_id
 * @property string|null $paid_by
 * @property string|null $paid_to
 * @property string|null $payment_method
 * @property string $payment_status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float $amount
 * @property string|null $transaction_type
 * @property int|null $order_details_id
 * @property-read Order|null $order
 * @method static Builder|Transaction newModelQuery()
 * @method static Builder|Transaction newQuery()
 * @method static Builder|Transaction query()
 * @method static Builder|Transaction whereAmount($value)
 * @method static Builder|Transaction whereCreatedAt($value)
 * @method static Builder|Transaction whereId($value)
 * @method static Builder|Transaction whereOrderDetailsId($value)
 * @method static Builder|Transaction whereOrderId($value)
 * @method static Builder|Transaction wherePaidBy($value)
 * @method static Builder|Transaction wherePaidTo($value)
 * @method static Builder|Transaction wherePayerId($value)
 * @method static Builder|Transaction wherePaymentFor($value)
 * @method static Builder|Transaction wherePaymentMethod($value)
 * @method static Builder|Transaction wherePaymentReceiverId($value)
 * @method static Builder|Transaction wherePaymentStatus($value)
 * @method static Builder|Transaction whereTransactionType($value)
 * @method static Builder|Transaction whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Transaction extends Model
{
    protected $connection = 'mysql';

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
