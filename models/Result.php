<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "results".
 *
 * @property int $id
 * @property int $user_id
 * @property int $biomarker_id
 * @property double $result
 * @property string $unit
 * @property string $date
 * @property string $references
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Biomarker $biomarker
 * @property User $user
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'results';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'biomarker_id'], 'required'],
            [['user_id', 'biomarker_id'], 'integer'],
            [['result'], 'number'],
            [['unit'], 'string', 'max' => 10],
            [['references', 'date'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'string', 'max' => 11],
            [['biomarker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Biomarker::class, 'targetAttribute' => ['biomarker_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'biomarker_id' => 'Biomarker ID',
            'result' => 'Result',
            'unit' => 'Unit',
            'references' => 'References',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiomarker()
    {
        return $this->hasOne(Biomarker::class, ['id' => 'biomarker_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
