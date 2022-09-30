<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carga".
 *
 * @property int $car_id Id
 * @property int $car_reticula_id Id retícula
 * @property int $car_materia_id Id materia
 *
 * @property Materia $carMateria
 * @property Reticula $carReticula
 */
class Carga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_reticula_id', 'car_materia_id'], 'required'],
            [['car_reticula_id', 'car_materia_id'], 'integer'],
            [['car_materia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['car_materia_id' => 'mat_id']],
            [['car_reticula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reticula::className(), 'targetAttribute' => ['car_reticula_id' => 'ret_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_id' => Yii::t('app', 'Id'),
            'car_reticula_id' => Yii::t('app', 'Id retícula'),
            'car_materia_id' => Yii::t('app', 'Id materia'),
        ];
    }

    /**
     * Gets query for [[CarMateria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarMateria()
    {
        return $this->hasOne(Materia::className(), ['mat_id' => 'car_materia_id']);
    }

    /**
     * Gets query for [[CarReticula]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarReticula()
    {
        return $this->hasOne(Reticula::className(), ['ret_id' => 'car_reticula_id']);
    }

    //método para obtener el nombre de la materia
    public function getMateria()
    {
        return $this->carMateria->mat_nombre;
    }
}
