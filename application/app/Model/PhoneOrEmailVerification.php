<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\PhoneOrEmailVerification
 *
 * @property int $id
 * @property string|null $phone_or_email
 * @property string|null $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneOrEmailVerification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneOrEmailVerification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneOrEmailVerification query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneOrEmailVerification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneOrEmailVerification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneOrEmailVerification wherePhoneOrEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneOrEmailVerification whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneOrEmailVerification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PhoneOrEmailVerification extends Model
{
    //
}
