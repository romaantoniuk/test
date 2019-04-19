<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 19.04.19
 * Time: 13:07
 */

namespace app\repositories;

use app\dtos\ResultDto;
use app\dtos\CreateTempResultDto;
use app\dtos\ResultsDto;
use app\interfaces\ResultRepositoryInterface;
use app\models\Result;
use Yii;
use yii\db\Exception;

/**
 * Class ResultRepository
 * @package app\repositories
 */
class ResultRepository implements ResultRepositoryInterface
{

    /**
     * @param $condition
     * @return Result
     * @throws Exception
     */
    public function get($condition): Result
    {
        $model = Result::findOne($condition);

        if(!$model)
            throw new Exception('Model not found');

        return $model;
    }

    /**
     * @param ResultDto $dto
     * @return bool
     * @throws \ReflectionException
     */
    public function create(ResultDto $dto): bool
    {
        $result = new Result();
        $result->setAttributes($dto->attributes(), false);

        return $result->save();
    }

    /**
     * @param ResultsDto $dto
     * @throws \ReflectionException
     * @throws Exception
     */
    public function createAll(ResultsDto $dto)
    {
        $rows = [];

        foreach ($dto->getResult() as $key => $resultDto) {
            $rows[] = $resultDto->attributes();

            if(count($rows) >= 5 || $key == count($dto->getResult()) - 1) {
                Yii::$app->db->createCommand()->batchInsert(Result::tableName(), [
                    'user_id', 'biomarker_id', 'result', 'date', 'unit', 'references'
                ], $rows)->execute();
//
                $rows = [];
            }
        }

        return true;

    }

}
