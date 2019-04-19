<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 19.04.19
 * Time: 16:19
 */

namespace app\dtos;

use app\abstracts\DtoAbstract;

/**
 * Class ResultsDto
 * @package app\dtos
 */
class ResultsDto extends DtoAbstract
{

    /**
     * @var ResultDto[] $results
     */
    private $results;

    /**
     * @param ResultDto $dto
     */
    public function setResult(ResultDto $dto)
    {
        $this->results[] = $dto;
    }

    /**
     * @return ResultDto[]
     */
    public function getResult()
    {
        return $this->results;
    }

}
