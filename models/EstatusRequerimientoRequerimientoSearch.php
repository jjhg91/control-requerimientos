<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstatusRequerimientoRequerimiento;

/**
 * EstatusRequerimientoRequerimientoSearch represents the model behind the search form of `app\models\EstatusRequerimientoRequerimiento`.
 */
class EstatusRequerimientoRequerimientoSearch extends EstatusRequerimientoRequerimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estatus_requerimeinto__requerimiento', 'id_requerimiento', 'id_estatus_requerimiento'], 'integer'],
            [['fecha_estatus_requerimiento'], 'safe'],
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
        $query = EstatusRequerimientoRequerimiento::find();

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
            'id_estatus_requerimeinto__requerimiento' => $this->id_estatus_requerimeinto__requerimiento,
            'id_requerimiento' => $this->id_requerimiento,
            'id_estatus_requerimiento' => $this->id_estatus_requerimiento,
        ]);

        $query->andFilterWhere(['ilike', 'fecha_estatus_requerimiento', $this->fecha_estatus_requerimiento]);

        return $dataProvider;
    }
}
