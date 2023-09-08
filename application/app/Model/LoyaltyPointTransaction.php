<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * App\Model\LoyaltyPointTransaction
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $transaction_id
 * @property float $credit
 * @property float $debit
 * @property float $balance
 * @property string|null $reference
 * @property string|null $transaction_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction whereCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction whereDebit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction whereTransactionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoyaltyPointTransaction whereUserId($value)
 * @mixin \Eloquent
 */
class LoyaltyPointTransaction extends Model
{
    use HasFactory;

    protected $casts = [
        'user_id' => 'integer',
        'credit' => 'float',
        'debit' => 'float',
        'balance'=>'float',
        'reference'=>'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
