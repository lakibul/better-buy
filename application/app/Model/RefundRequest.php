<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\RefundRequest
 *
 * @property int $id
 * @property int $order_details_id
 * @property int $customer_id
 * @property string $status
 * @property float $amount
 * @property int $product_id
 * @property int $order_id
 * @property string $refund_reason
 * @property string|null $images
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $approved_note
 * @property string|null $rejected_note
 * @property string|null $payment_info
 * @property string|null $change_by
 * @property-read User|null $customer
 * @property-read \App\Model\Order|null $order
 * @property-read \App\Model\OrderDetail|null $order_details
 * @property-read \App\Model\Product|null $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\RefundStatus[] $refund_status
 * @property-read int|null $refund_status_count
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereApprovedNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereChangeBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereOrderDetailsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest wherePaymentInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereRefundReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereRejectedNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RefundRequest extends Model
{
    use HasFactory;
    protected $connection = 'mysql';

    protected $casts = [
        'order_details_id' => 'integer',
        'customer_id' => 'integer',
        'status'=>'string',
        'amount' => 'float',
        'product_id' => 'integer',
        'order_id' => 'integer',
        'refund_reason'=>'string',
        'approved_note'=>'string',
        'rejected_note'=>'string',
        'payment_info'=>'string',
        'change_by'=>'string'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function order_details()
    {
        return $this->belongsTo(OrderDetail::class,'order_details_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
    public function refund_status()
    {
        return $this->hasMany(RefundStatus::class,'refund_request_id');
    }
}
