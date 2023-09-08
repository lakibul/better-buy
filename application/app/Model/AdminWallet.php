<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\AdminWallet
 *
 * @property int $id
 * @property int|null $admin_id
 * @property float $inhouse_earning
 * @property float $withdrawn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $commission_earned
 * @property float $delivery_charge_earned
 * @property float $pending_amount
 * @property float $total_tax_collected
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet whereCommissionEarned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet whereDeliveryChargeEarned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet whereInhouseEarning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet wherePendingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet whereTotalTaxCollected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminWallet whereWithdrawn($value)
 * @mixin \Eloquent
 */
class AdminWallet extends Model
{
    protected $casts = [
        'inhouse_earning' => 'float',
        'commission_earned' => 'float',
        'pending_amount' => 'float',
        'delivery_charge_earned' => 'float',
        'collected_cash' => 'float',
        'total_tax_collected' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}
