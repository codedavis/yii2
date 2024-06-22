<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rol".
 *
 * @property int $rol_id
 * @property string $codigo
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property Usuario[] $usuarios
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rol';
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
            'rol_id' => 'Rol',
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
        return $this->hasMany(Usuario::class, ['rol_id' => 'rol_id']);
    }
}
