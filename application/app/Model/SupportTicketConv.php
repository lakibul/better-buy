<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\SupportTicketConv
 *
 * @property int $id
 * @property int|null $support_ticket_id
 * @property int|null $admin_id
 * @property string|null $customer_message
 * @property string|null $admin_message
 * @property int $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicketConv newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicketConv newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicketConv query()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicketConv whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicketConv whereAdminMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicketConv whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicketConv whereCustomerMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicketConv whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicketConv wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicketConv whereSupportTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicketConv whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SupportTicketConv extends Model
{
    protected $connection = 'mysql';

    protected $casts = [
        'support_ticket_id' => 'integer',
        'admin_id'          => 'integer',
        'position'          => 'integer',

        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
    ];
}
