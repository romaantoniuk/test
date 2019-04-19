<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 18.04.19
 * Time: 16:52
 */

namespace app\dtos;

use app\abstracts\DtoAbstract;
use yii\helpers\Json;

/**
 * Class CreateResultDto
 * @package app\dtos
 */
class CreateTempResultDto extends DtoAbstract
{

    /**
     * @return string
     */
    public function __toString(): string
    {
        $data = [
            'user_id' => $this->user_id,
            'date' => $this->date,
            'results' => $this->results
        ];

        return Json::encode($data);
    }

    /**
     * @var integer $user_id
     */
    public $user_id;

    /**
     * @var string $date
     */
    public $date;

    /**
     * @var array $results
     */
    public $results;

}
