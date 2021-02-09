<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfil_usuario".
 *
 * @property int $id_perfil_usuario
 * @property string $descripcion
 *
 * @property PerfilUsuarioUsuario[] $perfilUsuarioUsuarios
 */
class PerfilUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $estatus = false;
    public $id_perfil_usuario__usuario;

    public static function tableName()
    {
        return 'perfil_usuario';
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
            'id_perfil_usuario' => 'Id Perfil Usuario',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[PerfilUsuarioUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilUsuarioUsuarios()
    {
        return $this->hasMany(PerfilUsuarioUsuario::className(), ['id_perfil_usuario', 'id_perfil_usuario']);
    }

    public function getUsuario()
    {
        return $this->hasMany(Usuario::className(), ['p00' => 'p00'])->viaTale(PerfilUsuarioUsuario::tableName(),['p00' => 'p00']);
    }
}
