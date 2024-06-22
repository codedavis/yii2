<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admins".
 *
 * @property int $admin_id
 * @property string $identificador
 * @property string $clave
 * @property int $usuario_id
 *
 * @property Usuario $usuario
 */
class Admins extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admins';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['identificador', 'clave', 'usuario_id'], 'required'],
            [['usuario_id'], 'integer'],
            [['identificador'], 'unique'],
            [['identificador'], 'string', 'max' => 50],
            [['clave'], 'string', 'max' => 255],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::class, 'targetAttribute' => ['usuario_id' => 'usuario_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin',
            'identificador' => 'Usuario',
            'clave' => 'Clave',
            'usuario_id' => 'Persona',
        ];
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::class, ['usuario_id' => 'usuario_id']);
    }
}
