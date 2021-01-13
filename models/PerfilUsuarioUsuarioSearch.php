<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PerfilUsuarioUsuario;

/**
 * PerfilUsuarioUsuarioSearch represents the model behind the search form of `app\models\PerfilUsuarioUsuario`.
 */
class PerfilUsuarioUsuarioSearch extends PerfilUsuarioUsuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_perfil_usuario__usuario', 'p00', 'id_perfil_usuario'], 'integer'],
            [['estatus_perfil'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PerfilUsuarioUsuario::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_perfil_usuario__usuario' => $this->id_perfil_usuario__usuario,
            'p00' => $this->p00,
            'id_perfil_usuario' => $this->id_perfil_usuario,
            'estatus_perfil' => $this->estatus_perfil,
        ]);

        return $dataProvider;
    }
}
