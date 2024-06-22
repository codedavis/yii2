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
            [['usuario_id', 'tipo_identificacion_id', 'rol_id'], 'integer'],
            [['identificacion', 'nombre', 'apellidos', 'fechaNacimiento'], 'safe'],
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
        $query = Usuario::find()->joinWith('rol');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'usuario_id' => $this->usuario_id,
            'fechaNacimiento' => $this->fechaNacimiento,
            'tipo_identificacion_id' => $this->tipo_identificacion_id,
            'rol_id' => $this->rol_id,
        ]);

        $query->andFilterWhere(['like', 'identificacion', $this->identificacion])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'rol.nombre', $this->getAttribute('rol.nombre')])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos]);

        return $dataProvider;
    }
}
