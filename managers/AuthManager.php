<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 18.04.19
 * Time: 12:28
 */

namespace app\managers;

use app\abstracts\ManagerAbstract;
use app\dtos\LoginDto;
use app\repositories\UserRepository;
use Yii;

/**
 * Class AuthManager
 * @package app\managers
 */
class AuthManager extends ManagerAbstract
{

    /**
     * @var UserRepository $userRepository
     */
    private $userRepository;

    /**
     * AuthManager constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->userRepository = $repository;
    }

    /**
     * @param LoginDto $dto
     * @return bool
     * @throws \yii\db\Exception
     */
    public function login(LoginDto $dto)
    {
        $user = $this->userRepository->get(['email' => $dto->email]);

        if(\Yii::$app->security->validatePassword($dto->password, $user->password)) {
            return Yii::$app->user->login($user);
        } else {
            return false;
        }

    }

    /**
     * @return bool
     */
    public function logout()
    {
        return Yii::$app->user->logout();
    }

}