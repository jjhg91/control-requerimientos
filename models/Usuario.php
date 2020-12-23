<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $p00
 * @property string $nombres
 * @property string $apellidos
 * @property string $password
 * @property string $correo
 * @property string $telefono
 * @property int $id_departamento
 * @property int $id_cargo
 * @property int $id_estatus_usuario
 * @property string|null $username
 * @property string|null $authKey
 * @property string|null $accessToken
 *
 * @property AreasVisibles[] $areasVisibles
 * @property Auditoria[] $auditorias
 * @property PerfilUsuarioUsuario[] $perfilUsuarioUsuarios
 * @property Requerimiento[] $requerimientos
 * @property Cargo $cargo
 * @property Departamento $departamento
 * @property EstatusUsuario $estatusUsuario
 * @property UsuarioAsignadoRequerimiento[] $usuarioAsignadoRequerimientos
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p00', 'nombres', 'apellidos', 'password', 'correo', 'telefono', 'id_departamento', 'id_cargo', 'id_estatus_usuario'], 'required'],
            [['p00', 'id_departamento', 'id_cargo', 'id_estatus_usuario'], 'default', 'value' => null],
            [['p00', 'id_departamento', 'id_cargo', 'id_estatus_usuario'], 'integer'],
            [['nombres', 'apellidos', 'password', 'correo', 'telefono', 'username', 'authKey', 'accessToken'], 'string'],
            [['p00'], 'unique'],
            [['id_cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['id_cargo' => 'id_cargo']],
            [['id_departamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['id_departamento' => 'id_departamento']],
            [['id_estatus_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => EstatusUsuario::className(), 'targetAttribute' => ['id_estatus_usuario' => 'id_estatus_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'p00' => 'P00',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'password' => 'Password',
            'correo' => 'Correo',
            'telefono' => 'Telefono',
            'id_departamento' => 'Id Departamento',
            'id_cargo' => 'Id Cargo',
            'id_estatus_usuario' => 'Id Estatus Usuario',
            'username' => 'Username',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }



    /**
     * Gets query for [[AreasVisibles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAreasVisibles()
    {
        return $this->hasMany(AreasVisibles::className(), ['p00' => 'p00']);
    }

    /**
     * Gets query for [[Auditorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuditorias()
    {
        return $this->hasMany(Auditoria::className(), ['p00' => 'p00']);
    }

    /**
     * Gets query for [[PerfilUsuarioUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilUsuarioUsuarios()
    {
        return $this->hasMany(PerfilUsuarioUsuario::className(), ['p00' => 'p00']);
    }

    /**
     * Gets query for [[Requerimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequerimientos()
    {
        return $this->hasMany(Requerimiento::className(), ['p00_solicitante' => 'p00']);
    }

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['id_cargo' => 'id_cargo']);
    }

    /**
     * Gets query for [[Departamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['id_departamento' => 'id_departamento']);
    }

    /**
     * Gets query for [[EstatusUsuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstatusUsuario()
    {
        return $this->hasOne(EstatusUsuario::className(), ['id_estatus_usuario' => 'id_estatus_usuario']);
    }

    /**
     * Gets query for [[UsuarioAsignadoRequerimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioAsignadoRequerimientos()
    {
        return $this->hasMany(UsuarioAsignadoRequerimiento::className(), ['p00' => 'p00']);
    }




    /**
     * INTEGRACION USUARIOS CON POSTGRESQL
     *
     * 
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    } 

    public static function findIdentityByAccessToken($token, $type=null)
    {
        return self::findOne(['accessToken'=>$token]);
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username'=>$username]);
    }
    
    function getId()
    {
        return $this->p00;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }

}
