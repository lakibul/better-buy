<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\WithdrawRequest
 *
 * @property int $id
 * @property int|null $seller_id
 * @property int|null $delivery_man_id
 * @property int|null $admin_id
 * @property float $amount
 * @property string|null $transaction_note
 * @property int $approved
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\DeliveryMan|null $delivery_men
 * @property-read \App\Model\Seller|null $seller
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawRequest whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawRequest whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawRequest whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawRequest whereDeliveryManId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawRequest whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawRequest whereTransactionNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WithdrawRequest extends Model
{
    protected $connection = 'mysql';

    protected $casts = [
        'amount' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function seller(){
        return $this->belongsTo(Seller::class,'seller_id');
    }

    public function delivery_men(){
        return $this->belongsTo(DeliveryMan::class,'delivery_man_id');
    }
}
