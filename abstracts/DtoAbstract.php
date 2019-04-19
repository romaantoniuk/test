<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 18.04.19
 * Time: 10:48
 */

namespace app\abstracts;

use ReflectionClass;

/**
 * Class DtoAbstract
 * @package app\interfaces
 */
abstract class DtoAbstract
{

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function attributes()
    {
        $class = new ReflectionClass($this);
        $names = [];
        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            if (!$property->isStatic()) {
                $names[$property->getName()] = $this->{$property->getName()};
            }
        }

        return $names;
    }

}
