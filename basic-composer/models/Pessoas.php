<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pessoas".
 *
 * @property integer $id
 * @property string $nome
 * @property string $email
 * @property string $cidade
 * @property string $estado
 */
class Pessoas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pessoas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'email'], 'required'],
            [['nome', 'email', 'cidade'], 'string', 'max' => 60],
            [['estado'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
        ];
    }
}
