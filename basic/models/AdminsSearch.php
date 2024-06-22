<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Admins;

/**
 * AdminsSearch represents the model behind the search form of `app\models\Admins`.
 */
class AdminsSearch extends Admins
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_id', 'usuario_id'], 'integer'],
            [['identificador', 'clave'], 'safe'],
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
        $query = Admins::find()->joinWith('usuario');

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
            'admin_id' => $this->admin_id,
            'usuario_id' => $this->usuario_id,
        ]);

        $query->andFilterWhere(['like', 'identificador', $this->identificador])
            ->andFilterWhere(['like', 'clave', $this->clave]);

        return $dataProvider;
    }
}
