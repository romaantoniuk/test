<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 19.04.19
 * Time: 10:41
 */

namespace app\interfaces;

use app\dtos\ResultDto;
use app\models\Result;

/**
 * Interface ResultRepositoryInterface
 * @package app\interfaces
 */
interface ResultRepositoryInterface
{

    /**
     * @param $condition
     * @return Result
     */
    public function get($condition): Result;

    /**
     * @param ResultDto $dto
     * @return bool
     */
    public function create(ResultDto $dto): bool;

}
