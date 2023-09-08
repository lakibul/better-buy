<?php

namespace App\Model;

use Laravel\Passport\Client as PassportClient;

/**
 * App\Model\Client
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string $secret
 * @property string $redirect
 * @property bool $personal_access_client
 * @property bool $password_client
 * @property bool $revoked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $provider
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\AuthCode[] $authCodes
 * @property-read int|null $auth_codes_count
 * @property-read string|null $plain_secret
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Token[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\User|null $user
 * @method static \Laravel\Passport\Database\Factories\ClientFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePasswordClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePersonalAccessClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereRedirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUserId($value)
 * @mixin \Eloquent
 */
class Client extends PassportClient
{
    //
}
