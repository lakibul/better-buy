<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\AdminWalletHistory
 *
 * @property int $id
 * @property int|null $admin_id
 * @property float $amount
 * @property int|null $order_id
 * @property int|null $product_id
 * @property string $payment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWalletHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWalletHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWalletHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWalletHistory whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWalletHistory whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWalletHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWalletHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWalletHistory whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWalletHistory wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWalletHistory whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWalletHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminWalletHistory extends Model
{
    //
}
