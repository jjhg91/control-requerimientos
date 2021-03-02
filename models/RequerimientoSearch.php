<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Requerimiento;

/**
 * RequerimientoSearch represents the model behind the search form of `app\models\Requerimiento`.
 */
class RequerimientoSearch extends Requerimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_requerimiento', 'p00_solicitante', 'id_frecuencia', 'id_tipo_requerimiento'], 'integer'],
            [['fecha_solicitud', 'objetivo', 'descripcion', 'datos', 'fecha_requerida', 'fecha_registro'], 'safe'],
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
        $query = Requerimiento::find();

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
            'id_requerimiento' => $this->id_requerimiento,
            'p00_solicitante' => $this->p00_solicitante,
            'id_frecuencia' => $this->id_frecuencia,
            'id_tipo_requerimiento' => $this->id_tipo_requerimiento,
        ]);

        $query->andFilterWhere(['ilike', 'fecha_solicitud', $this->fecha_solicitud])
            ->andFilterWhere(['ilike', 'objetivo', $this->objetivo])
            ->andFilterWhere(['ilike', 'descripcion', $this->descripcion])
            ->andFilterWhere(['ilike', 'datos', $this->datos])
            ->andFilterWhere(['ilike', 'fecha_requerida', $this->fecha_requerida])
            ->andFilterWhere(['ilike', 'fecha_registro', $this->fecha_registro]);

        return $dataProvider;
    }
}
