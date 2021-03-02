<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property int $id_departamento
 * @property string $descripcion
 *
 * @property AreasVisibles[] $areasVisibles
 * @property Usuario[] $usuarios
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamento';
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
            'id_departamento' => 'Id Departamento',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[AreasVisibles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAreasVisibles()
    {
        return $this->hasMany(AreasVisibles::className(), ['id_departamento' => 'id_departamento']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id_departamento' => 'id_departamento']);
    }
}
