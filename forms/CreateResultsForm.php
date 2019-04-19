<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 18.04.19
 * Time: 16:56
 */

namespace app\forms;

use app\abstracts\DtoAbstract;
use app\abstracts\FormAbstract;
use app\dtos\CreateTempResultDto;

/**
 * Class CreateResultsForm
 * @package app\forms
 */
class CreateResultsForm extends FormAbstract
{

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

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['user_id', 'date', 'results'], 'required']
        ];
    }

    /**
     * @return DtoAbstract|CreateTempResultDto
     */
    public function getDto(): DtoAbstract
    {
        $dto = new CreateTempResultDto();
        $dto->user_id = $this->user_id;
        $dto->date = $this->date;
        $dto->results = $this->results;

        return $dto;
    }

}
