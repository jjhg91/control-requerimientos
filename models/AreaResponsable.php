<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area_responsable".
 *
 * @property int $id_area_responsable
 * @property string $descripcion
 *
 * @property TipoRequerimiento[] $tipoRequerimientos
 */
class AreaResponsable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area_responsable';
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
            'id_area_responsable' => 'Id Area Responsable',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[TipoRequerimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoRequerimientos()
    {
        return $this->hasMany(TipoRequerimiento::className(), ['id_area_responsable' => 'id_area_responsable']);
    }
}
