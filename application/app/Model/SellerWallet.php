<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\SellerWallet
 *
 * @property int $id
 * @property int|null $seller_id
 * @property float $total_earning
 * @property float $withdrawn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $commission_given
 * @property float $pending_withdraw
 * @property float $delivery_charge_earned
 * @property float $collected_cash
 * @property float $total_tax_collected
 * @property-read \App\Model\Seller|null $seller
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet whereCollectedCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet whereCommissionGiven($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet whereDeliveryChargeEarned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet wherePendingWithdraw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet whereTotalEarning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet whereTotalTaxCollected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWallet whereWithdrawn($value)
 * @mixin \Eloquent
 */
class SellerWallet extends Model
{
    protected $connection = 'mysql';

    protected $casts = [
        'total_earning' => 'float',
        'withdrawn' => 'float',
        'commission_given' => 'float',
        'pending_withdraw' => 'float',
        'delivery_charge_earned' => 'float',
        'collected_cash' => 'float',
        'total_tax_collected' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
