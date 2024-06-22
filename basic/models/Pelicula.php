<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelicula".
 *
 * @property int $pelicula_id
 * @property string $nombre
 * @property string $url
 * @property int $estado
 * @property int $usuario_id
 * @property string|null $imagen
 *
 * @property Pago[] $pagos
 * @property Reserva[] $reservas
 * @property Usuario $usuario
 */
class Pelicula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelicula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'url', 'estado', 'usuario_id'], 'required'],
            [[ 'usuario_id'], 'integer'],
            [['estado'], 'boolean'],
            [['nombre'], 'string', 'max' => 255],
            [['url','imagen'], 'string', 'max' => 3000],
            //[['imagen'], 'string', 'max' => 2000],
            //[['imagen'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::class, 'targetAttribute' => ['usuario_id' => 'usuario_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pelicula_id' => 'Pelicula ID',
            'nombre' => 'Nombre',
            'url' => 'Url',
            'estado' => 'Estado',
            'usuario_id' => 'Administrador',
            'imagen' => 'Imagen',
        ];
    }

    /**
     * Gets query for [[Pagos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::class, ['pelicula_id' => 'pelicula_id']);
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::class, ['pelicula_id' => 'pelicula_id']);
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
