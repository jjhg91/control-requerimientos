<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfil_usuario__usuario".
 *
 * @property int $id_perfil_usuario__usuario
 * @property int $p00
 * @property int $id_perfil_usuario
 * @property bool $estatus_perfil
 *
 * @property PerfilUsuario $perfilUsuario
 * @property Usuario $p000
 */
class PerfilUsuarioUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil_usuario__usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p00', 'id_perfil_usuario'], 'required'],
            [['p00', 'id_perfil_usuario'], 'default', 'value' => null],
            [['p00', 'id_perfil_usuario'], 'integer'],
            [['estatus_perfil'], 'boolean'],
            [['id_perfil_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => PerfilUsuario::className(), 'targetAttribute' => ['id_perfil_usuario' => 'id_perfil_usuario']],
            [['p00'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['p00' => 'p00']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_perfil_usuario__usuario' => 'Id Perfil Usuario Usuario',
            'p00' => 'P00',
            'id_perfil_usuario' => 'Id Perfil Usuario',
            'estatus_perfil' => 'Estatus Perfil',
        ];
    }

    /**
     * Gets query for [[PerfilUsuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilUsuario()
    {
        return $this->hasOne(PerfilUsuario::className(), ['id_perfil_usuario' => 'id_perfil_usuario']);
    }

    /**
     * Gets query for [[P000]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getP000()
    {
        return $this->hasOne(Usuario::className(), ['p00' => 'p00']);
    }
}
