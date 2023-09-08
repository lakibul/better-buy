<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\DeliveryManTransaction
 *
 * @property int $id
 * @property int $delivery_man_id
 * @property int $user_id
 * @property string $user_type
 * @property string $transaction_id
 * @property string $debit
 * @property string $credit
 * @property string $transaction_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction whereCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction whereDebit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction whereDeliveryManId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction whereTransactionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryManTransaction whereUserType($value)
 * @mixin \Eloquent
 */
class DeliveryManTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['delivery_man_id', 'user_id', 'user_type', 'debit', 'transaction_id', 'credit', 'transaction_type'];
}
