<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aula".
 *
 * @property int $aul_id Id
 * @property string $aul_numero No de aula
 *
 * @property Grupo[] $grupos
 */
class Aula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aul_numero'], 'required'],
            [['aul_numero'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'aul_id' => Yii::t('app', 'Id'),
            'aul_numero' => Yii::t('app', 'No de aula'),
        ];
    }

    /**
     * Gets query for [[Grupos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::className(), ['gru_aula_id' => 'aul_id']);
    }
}
