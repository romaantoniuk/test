<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 18.04.19
 * Time: 13:08
 */

namespace app\repositories;

use app\abstracts\RepositoryAbstract;
use app\models\User;
use yii\db\Exception;

/**
 * Class UserRepository
 * @package app\repositories
 */
class UserRepository extends RepositoryAbstract
{

    /**
     * @param $condition
     * @return User
     * @throws Exception
     */
    public function get($condition): User
    {
        $user = User::findOne($condition);

        if(!$user)
            throw new Exception('User with this condition not found');

        return $user;
    }

}
