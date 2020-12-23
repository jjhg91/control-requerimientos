<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estatus_requerimiento".
 *
 * @property int $id_estatus_requerimiento
 * @property string $descripcion
 *
 * @property EstatusRequerimientoRequerimiento[] $estatusRequerimientoRequerimientos
 */
class EstatusRequerimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estatus_requerimiento';
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
            'id_estatus_requerimiento' => 'Id Estatus Requerimiento',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[EstatusRequerimientoRequerimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstatusRequerimientoRequerimientos()
    {
        return $this->hasMany(EstatusRequerimientoRequerimiento::className(), ['id_estatus_requerimiento' => 'id_estatus_requerimiento']);
    }
}
