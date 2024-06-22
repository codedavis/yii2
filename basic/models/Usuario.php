<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $usuario_id
 * @property string $identificacion
 * @property string $nombre
 * @property string $apellidos
 * @property string $fechaNacimiento
 * @property int $tipo_identificacion_id
 * @property int $rol_id
 *
 * @property Admin[] $admins
 * @property Pago[] $pagos
 * @property Pelicula[] $peliculas
 * @property Reserva[] $reservas
 * @property Rol $rol
 * @property Tipoidentificacion $tipoIdentificacion
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['identificacion', 'nombre', 'apellidos', 'fechaNacimiento', 'tipo_identificacion_id', 'rol_id'], 'required'],
            [['fechaNacimiento'], 'safe'],
            [['tipo_identificacion_id', 'rol_id'], 'integer'],
            [['identificacion', 'nombre', 'apellidos'], 'string', 'max' => 255],
            [['tipo_identificacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoidentificacion::class, 'targetAttribute' => ['tipo_identificacion_id' => 'tipo_identificacion_id']],
            [['rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::class, 'targetAttribute' => ['rol_id' => 'rol_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usuario_id' => 'Usuario',
            'identificacion' => 'Identificación',
            'nombre' => 'Nombres',
            'apellidos' => 'Apellidos',
            'fechaNacimiento' => 'Fecha Nacimiento',
            'tipo_identificacion_id' => 'Tipo de Identificación',
            'rol_id' => 'Rol',
        ];
    }

    /**
     * Gets query for [[Admins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmins()
    {
        return $this->hasMany(Admins::class, ['usuario_id' => 'usuario_id']);
    }

    /**
     * Gets query for [[Pagos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::class, ['usuario_id' => 'usuario_id']);
    }

    /**
     * Gets query for [[Peliculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeliculas()
    {
        return $this->hasMany(Pelicula::class, ['usuario_id' => 'usuario_id']);
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::class, ['usuario_id' => 'usuario_id']);
    }

    /**
     * Gets query for [[Rol]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::class, ['rol_id' => 'rol_id']);
    }

    /**
     * Gets query for [[TipoIdentificacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoIdentificacion()
    {
        return $this->hasOne(Tipoidentificacion::class, ['tipo_identificacion_id' => 'tipo_identificacion_id']);
    }
}
