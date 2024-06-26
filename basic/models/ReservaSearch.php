<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reserva;

/**
 * ReservaSearch represents the model behind the search form of `app\models\Reserva`.
 */
class ReservaSearch extends Reserva
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reserva_id', 'usuario_id', 'pelicula_id'], 'integer'],
            [['fechaResera'], 'safe'],
            [['costo'], 'number'],
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
        $query = Reserva::find()->joinWith(['usuario','pelicula']);;

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
            'reserva_id' => $this->reserva_id,
            'fechaResera' => $this->fechaResera,
            'costo' => $this->costo,
            'usuario_id' => $this->usuario_id,
            'pelicula_id' => $this->pelicula_id,
        ]);

        return $dataProvider;
    }
}
