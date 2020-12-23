<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_requerimiento".
 *
 * @property int $id_tipo_requerimiento
 * @property string $descripcion
 * @property int $id_area_responsable
 * @property bool $envio_correo
 * @property bool $habilitado
 *
 * @property Requerimiento[] $requerimientos
 * @property AreaResponsable $areaResponsable
 */
class TipoRequerimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_requerimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'id_area_responsable', 'envio_correo', 'habilitado'], 'required'],
            [['descripcion'], 'string'],
            [['id_area_responsable'], 'default', 'value' => null],
            [['id_area_responsable'], 'integer'],
            [['envio_correo', 'habilitado'], 'boolean'],
            [['id_area_responsable'], 'exist', 'skipOnError' => true, 'targetClass' => AreaResponsable::className(), 'targetAttribute' => ['id_area_responsable' => 'id_area_responsable']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_requerimiento' => 'Id Tipo Requerimiento',
            'descripcion' => 'Descripcion',
            'id_area_responsable' => 'Id Area Responsable',
            'envio_correo' => 'Envio Correo',
            'habilitado' => 'Habilitado',
        ];
    }

    /**
     * Gets query for [[Requerimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequerimientos()
    {
        return $this->hasMany(Requerimiento::className(), ['id_tipo_requerimiento' => 'id_tipo_requerimiento']);
    }

    /**
     * Gets query for [[AreaResponsable]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAreaResponsable()
    {
        return $this->hasOne(AreaResponsable::className(), ['id_area_responsable' => 'id_area_responsable']);
    }
}
