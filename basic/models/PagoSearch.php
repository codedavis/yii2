<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pago;

/**
 * PagoSearch represents the model behind the search form of `app\models\Pago`.
 */
class PagoSearch extends Pago
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pago_id', 'estado', 'reserva_id'], 'integer'],
            [['numero', 'fecha'], 'safe'],
            [['monto'], 'number'],
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
        $query = Pago::find()->joinWith('reserva');;

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
            'pago_id' => $this->pago_id,
            'fecha' => $this->fecha,
            'monto' => $this->monto,
            'estado' => $this->estado,
            'reserva_id' => $this->reserva_id,
        ]);

        $query->andFilterWhere(['like', 'numero', $this->numero]);

        return $dataProvider;
    }
}
