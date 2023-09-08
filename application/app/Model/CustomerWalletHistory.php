<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\CustomerWalletHistory
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string $transaction_amount
 * @property string|null $transaction_type
 * @property string|null $transaction_method
 * @property string|null $transaction_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWalletHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWalletHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWalletHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWalletHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWalletHistory whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWalletHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWalletHistory whereTransactionAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWalletHistory whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWalletHistory whereTransactionMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWalletHistory whereTransactionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWalletHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CustomerWalletHistory extends Model
{
    //
}
