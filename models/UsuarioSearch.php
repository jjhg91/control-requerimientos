<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form of `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['p00', 'id_departamento', 'id_cargo', 'id_estatus_usuario'], 'integer'],
            [['nombres', 'apellidos', 'password', 'correo', 'telefono', 'username', 'authKey', 'accessToken'], 'safe'],
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
        $query = Usuario::find();

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
            'p00' => $this->p00,
            'id_departamento' => $this->id_departamento,
            'id_cargo' => $this->id_cargo,
            'id_estatus_usuario' => $this->id_estatus_usuario,
        ]);

        $query->andFilterWhere(['ilike', 'nombres', $this->nombres])
            ->andFilterWhere(['ilike', 'apellidos', $this->apellidos])
            ->andFilterWhere(['ilike', 'password', $this->password])
            ->andFilterWhere(['ilike', 'correo', $this->correo])
            ->andFilterWhere(['ilike', 'telefono', $this->telefono])
            ->andFilterWhere(['ilike', 'username', $this->username])
            ->andFilterWhere(['ilike', 'authKey', $this->authKey])
            ->andFilterWhere(['ilike', 'accessToken', $this->accessToken]);

        return $dataProvider;
    }
}
