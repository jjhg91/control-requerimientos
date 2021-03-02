<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoRequerimiento;

/**
 * TipoRequerimientoSearch represents the model behind the search form of `app\models\TipoRequerimiento`.
 */
class TipoRequerimientoSearch extends TipoRequerimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipo_requerimiento', 'id_area_responsable'], 'integer'],
            [['descripcion'], 'safe'],
            [['envio_correo', 'habilitado'], 'boolean'],
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
        $query = TipoRequerimiento::find();

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
            'id_tipo_requerimiento' => $this->id_tipo_requerimiento,
            'id_area_responsable' => $this->id_area_responsable,
            'envio_correo' => $this->envio_correo,
            'habilitado' => $this->habilitado,
        ]);

        $query->andFilterWhere(['ilike', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
