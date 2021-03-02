<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estatus_requerimiento__requerimiento".
 *
 * @property int $id_estatus_requerimeinto__requerimiento
 * @property int $id_requerimiento
 * @property int $id_estatus_requerimiento
 * @property string $fecha_estatus_requerimiento
 *
 * @property EstatusRequerimiento $estatusRequerimiento
 * @property Requerimiento $requerimiento
 */
class EstatusRequerimientoRequerimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estatus_requerimiento__requerimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_requerimiento', 'id_estatus_requerimiento', 'fecha_estatus_requerimiento'], 'required'],
            [['id_requerimiento', 'id_estatus_requerimiento'], 'default', 'value' => null],
            [['id_requerimiento', 'id_estatus_requerimiento'], 'integer'],
            [['fecha_estatus_requerimiento'], 'string'],
            [['id_estatus_requerimiento'], 'exist', 'skipOnError' => true, 'targetClass' => EstatusRequerimiento::className(), 'targetAttribute' => ['id_estatus_requerimiento' => 'id_estatus_requerimiento']],
            [['id_requerimiento'], 'exist', 'skipOnError' => true, 'targetClass' => Requerimiento::className(), 'targetAttribute' => ['id_requerimiento' => 'id_requerimiento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estatus_requerimeinto__requerimiento' => 'Id Estatus Requerimeinto Requerimiento',
            'id_requerimiento' => 'Id Requerimiento',
            'id_estatus_requerimiento' => 'Id Estatus Requerimiento',
            'fecha_estatus_requerimiento' => 'Fecha Estatus Requerimiento',
        ];
    }

    /**
     * Gets query for [[EstatusRequerimiento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstatusRequerimiento()
    {
        return $this->hasOne(EstatusRequerimiento::className(), ['id_estatus_requerimiento' => 'id_estatus_requerimiento']);
    }

    /**
     * Gets query for [[Requerimiento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequerimiento()
    {
        return $this->hasOne(Requerimiento::className(), ['id_requerimiento' => 'id_requerimiento']);
    }
}
