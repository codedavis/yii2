<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $reserva_id
 * @property string $fechaResera
 * @property float $costo
 * @property int $usuario_id
 * @property int $pelicula_id
 *
 * @property Pelicula $pelicula
 * @property Usuario $usuario
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fechaResera', 'costo', 'usuario_id', 'pelicula_id'], 'required'],
            [['fechaResera'], 'safe'],
            [['costo'], 'number'],
            [['usuario_id', 'pelicula_id'], 'integer'],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::class, 'targetAttribute' => ['usuario_id' => 'usuario_id']],
            [['pelicula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pelicula::class, 'targetAttribute' => ['pelicula_id' => 'pelicula_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reserva_id' => 'Reserva',
            'fechaResera' => 'Fecha Resera',
            'costo' => 'Costo USD',
            'usuario_id' => 'Usuario',
            'pelicula_id' => 'Pelicula',
        ];
    }

    /**
     * Gets query for [[Pelicula]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelicula()
    {
        return $this->hasOne(Pelicula::class, ['pelicula_id' => 'pelicula_id']);
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
