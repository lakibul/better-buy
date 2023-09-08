<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\DeliverymanWallet
 *
 * @property int $id
 * @property int $delivery_man_id
 * @property string $current_balance
 * @property string $cash_in_hand
 * @property string $pending_withdraw
 * @property string $total_withdraw
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\DeliveryMan|null $delivery_man
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanWallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanWallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanWallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanWallet whereCashInHand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanWallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanWallet whereCurrentBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanWallet whereDeliveryManId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanWallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanWallet wherePendingWithdraw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanWallet whereTotalWithdraw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliverymanWallet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DeliverymanWallet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function delivery_man()
    {
        return $this->belongsTo(DeliveryMan::class, 'delivery_man_id');
    }
}
