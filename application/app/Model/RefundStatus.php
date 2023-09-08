<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\RefundStatus
 *
 * @property int $id
 * @property int|null $refund_request_id
 * @property string|null $change_by
 * @property string|null $change_by_id
 * @property string|null $status
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus whereChangeBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus whereChangeById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus whereRefundRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RefundStatus extends Model
{
    use HasFactory;
    protected $connection = 'mysql';

    protected $casts = [
        'refund_request_id' => 'integer',
        'change_by' => 'string',
        'change_by_id' => 'string',
        'status' => 'string',
        'message' => 'string',
    ];
}
