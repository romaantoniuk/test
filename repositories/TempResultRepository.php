<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 19.04.19
 * Time: 10:57
 */

namespace app\repositories;

use app\dtos\CreateTempResultDto;
use app\interfaces\ResultRepositoryInterface;
use app\models\Result;

/**
 * Class ResultTempFileRepository
 * @package app\repositories
 */
class TempResultRepository
{

    public function getAll()
    {
        return preg_grep('/^([^.])/', scandir(__DIR__ ."/../storage"));
    }

    /**
     * @param CreateTempResultDto $dto
     * @return bool
     */
    public function create(CreateTempResultDto $dto): bool
    {
        $data = strval($dto);

        return file_put_contents(\Yii::getAlias('@app/storage/results'.time() . '.json'), $data);
    }

}
