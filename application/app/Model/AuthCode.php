<?php

namespace App\Model;

use Laravel\Passport\AuthCode as PassportAuthCode;
/**
 * App\Model\AuthCode
 *
 * @property string $id
 * @property int $user_id
 * @property int $client_id
 * @property string|null $scopes
 * @property bool $revoked
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property-read \App\Model\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthCode whereUserId($value)
 * @mixin \Eloquent
 */
class AuthCode extends PassportAuthCode
{
    //
}
