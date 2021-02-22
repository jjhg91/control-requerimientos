<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requerimiento".
 *
 * @property int $id_requerimiento
 * @property string $fecha_solicitud
 * @property string $objetivo
 * @property string $descripcion
 * @property string $datos
 * @property string $fecha_requerida
 * @property string $fecha_registro
 * @property int $p00_solicitante
 * @property int $id_frecuencia
 * @property int $id_tipo_requerimiento
 *
 * @property EstatusRequerimientoRequerimiento[] $estatusRequerimientoRequerimientos
 * @property Frecuencia $frecuencia
 * @property TipoRequerimiento $tipoRequerimiento
 * @property Usuario $p00Solicitante
 * @property UsuarioAsignadoRequerimiento[] $usuarioAsignadoRequerimientos
 */
class Requerimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requerimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_solicitud', 'objetivo', 'descripcion', 'datos', 'fecha_requerida', 'fecha_registro', 'p00_solicitante', 'id_frecuencia', 'id_tipo_requerimiento'], 'required'],
            [['fecha_solicitud', 'objetivo', 'descripcion', 'datos', 'fecha_requerida', 'fecha_registro'], 'string'],
            [['p00_solicitante', 'id_frecuencia', 'id_tipo_requerimiento'], 'default', 'value' => null],
            [['p00_solicitante', 'id_frecuencia', 'id_tipo_requerimiento'], 'integer'],
            [['id_frecuencia'], 'exist', 'skipOnError' => true, 'targetClass' => Frecuencia::className(), 'targetAttribute' => ['id_frecuencia' => 'id_frecuencia']],
            [['id_tipo_requerimiento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoRequerimiento::className(), 'targetAttribute' => ['id_tipo_requerimiento' => 'id_tipo_requerimiento']],
            [['p00_solicitante'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['p00_solicitante' => 'p00']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_requerimiento' => 'REQUERIMIENTO NRO.',
            'fecha_solicitud' => 'FECHA DE SOLICITUD',
            'objetivo' => 'OBJETIVO DE REQUERIMIENTO',
            'descripcion' => 'DESCRIPCION DEL REQUERIMIENTO',
            'datos' => 'DATOS REQUERIDOS',
            'fecha_requerida' => 'FECHA REQUERIDA',
            'fecha_registro' => 'FECHA REGISTRO',
            'p00_solicitante' => 'SOLICITANTE',
            'id_frecuencia' => 'FRECUENCIA',
            'id_tipo_requerimiento' => 'TIPO DE REQUERIMIENTO',
        ];
    }

    /**
     * Gets query for [[EstatusRequerimientoRequerimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstatusRequerimientoRequerimientos()
    {
        return $this->hasMany(EstatusRequerimientoRequerimiento::className(), ['id_requerimiento' => 'id_requerimiento']);
    }

    /**
     * Gets query for [[Frecuencia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrecuencia()
    {
        return $this->hasOne(Frecuencia::className(), ['id_frecuencia' => 'id_frecuencia']);
    }

    /**
     * Gets query for [[TipoRequerimiento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoRequerimiento()
    {
        return $this->hasOne(TipoRequerimiento::className(), ['id_tipo_requerimiento' => 'id_tipo_requerimiento']);
    }

    /**
     * Gets query for [[P00Solicitante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getP00Solicitante()
    {
        return $this->hasOne(Usuario::className(), ['p00' => 'p00_solicitante']);
    }

    /**
     * Gets query for [[UsuarioAsignadoRequerimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioAsignadoRequerimientos()
    {
        return $this->hasMany(UsuarioAsignadoRequerimiento::className(), ['id_requerimiento' => 'id_requerimiento']);
    }
}
