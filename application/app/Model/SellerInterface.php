<?php

namespace App\Model;

use Eloquent;
use Hoyvoy\CrossDatabase\Eloquent\Builder;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Hoyvoy\CrossDatabase\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

/**
 * App\Model\UserInterface
 *
 * @method static Builder|UserInterface newModelQuery()
 * @method static Builder|UserInterface newQuery()
 * @method static Builder|UserInterface query()
 * @mixin Eloquent
 */
class SellerInterface extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
}
