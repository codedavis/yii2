<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago".
 *
 * @property int $pago_id
 * @property string $numero
 * @property string $fecha
 * @property float $monto
 * @property int $estado
 * @property int $reserva_id
 *
 * @property Reserva $reserva
 */
class Pago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero', 'fecha', 'monto', 'estado', 'reserva_id'], 'required'],
            [['fecha'], 'safe'],
            [['monto'], 'number'],
            [['estado', 'reserva_id'], 'integer'],
            [['numero'], 'string', 'max' => 255],
            [['reserva_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::class, 'targetAttribute' => ['reserva_id' => 'reserva_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pago_id' => 'Pago',
            'numero' => 'Número de Pago',
            'fecha' => 'Fecha de Pago',
            'monto' => 'Monto USD',
            'estado' => 'Estado',
            'reserva_id' => 'Reserva',
        ];
    }

    /**
     * Gets query for [[Reserva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::class, ['reserva_id' => 'reserva_id']);
    }
}
