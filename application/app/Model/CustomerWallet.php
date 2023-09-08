<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\CustomerWallet
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string $balance
 * @property string $royality_points
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWallet whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWallet whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWallet whereRoyalityPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomerWallet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CustomerWallet extends Model
{
    //
}
