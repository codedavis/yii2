<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipoidentificacion".
 *
 * @property int $tipo_identificacion_id
 * @property string $codigo
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Usuario[] $usuarios
 */
class Tipoidentificacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipoidentificacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre'], 'required'],
            [['codigo', 'nombre'], 'string', 'max' => 255],
            [['descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tipo_identificacion_id' => 'Tipo Identificacion',
            'codigo' => 'Código',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
        ];
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::class, ['tipo_identificacion_id' => 'tipo_identificacion_id']);
    }
}
