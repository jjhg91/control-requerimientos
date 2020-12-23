<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estatus_usuario".
 *
 * @property int $id_estatus_usuario
 * @property string $descripcion
 *
 * @property Usuario[] $usuarios
 */
class EstatusUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estatus_usuario';
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
            'id_estatus_usuario' => 'Id Estatus Usuario',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['id_estatus_usuario' => 'id_estatus_usuario']);
    }
}
