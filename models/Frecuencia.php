<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "frecuencia".
 *
 * @property int $id_frecuencia
 * @property string $descripcion
 *
 * @property Requerimiento[] $requerimientos
 */
class Frecuencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'frecuencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_frecuencia' => 'Id Frecuencia',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Requerimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequerimientos()
    {
        return $this->hasMany(Requerimiento::className(), ['id_frecuencia' => 'id_frecuencia']);
    }
}
