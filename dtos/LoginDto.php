<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 18.04.19
 * Time: 12:30
 */

namespace app\dtos;

use app\abstracts\DtoAbstract;

/**
 * Class LoginDto
 * @package app\dtos
 */
class LoginDto extends DtoAbstract
{

    /**
     * @var string $email
     */
    public $email;

    /**
     * @var string $password
     */
    public $password;

    /**
     * @var bool $rememberMe
     */
    public $rememberMe;
}