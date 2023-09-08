<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\SellerWalletHistory
 *
 * @property int $id
 * @property int|null $seller_id
 * @property float $amount
 * @property int|null $order_id
 * @property int|null $product_id
 * @property string $payment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWalletHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWalletHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWalletHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWalletHistory whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWalletHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWalletHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWalletHistory whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWalletHistory wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWalletHistory whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWalletHistory whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SellerWalletHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SellerWalletHistory extends Model
{
    protected $connection = 'mysql';

}
