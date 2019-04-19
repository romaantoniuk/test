<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 18.04.19
 * Time: 16:56
 */

namespace app\abstracts;

use yii\base\Model;

/**
 * Class FormAbstract
 * @package app\abstracts
 */
abstract class FormAbstract extends Model
{

    /**
     * @return DtoAbstract
     */
    abstract public function getDto(): DtoAbstract;

}
