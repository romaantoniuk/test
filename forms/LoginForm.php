<?php

namespace app\forms;

use app\abstracts\FormAbstract;
use app\dtos\LoginDto;
use app\abstracts\DtoAbstract;
use app\models\User;

/**
 * LoginForm is the model behind the login form.
 *
 * @property \app\dtos\LoginDto|\app\abstracts\DtoAbstract $dto
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends FormAbstract
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
    public $rememberMe = true;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
        ];
    }

    /**
     * @return DtoAbstract|LoginDto
     */
    public function getDto(): DtoAbstract
    {
        $dto = new LoginDto();
        $dto->email = $this->email;
        $dto->password = $this->password;
        $dto->rememberMe = $this->rememberMe;

        return $dto;
    }
}
