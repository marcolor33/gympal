<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2017/1/10
 * Time: 上午 03:37
 */

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Account extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $table = 'account';
    protected $primaryKey ='account_id';
}