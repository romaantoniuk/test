<?php
/**
 * Created by PhpStorm.
 * User: desktop
 * Date: 19.04.19
 * Time: 13:13
 */

namespace app\dtos;

use app\abstracts\DtoAbstract;

/**
 * Class CreateResultDto
 * @package app\dtos
 */
class ResultDto extends DtoAbstract
{

    /**
     * @var integer $user_id
     */
    public $user_id;

    /**
     * @var integer $biomarker_id
     */
    public $biomarker_id;

    /**
     * @var double $result
     */
    public $result;

    /**
     * @var string $date
     */
    public $date;

    /**
     * @var string $unit
     */
    public $unit;

    /**
     * @var string $references
     */
    public $references;

}
