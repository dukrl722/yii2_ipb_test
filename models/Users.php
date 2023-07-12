<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "users".
 *
 * @property int $ID
 * @property string $name
 * @property string $date_of_birth
 * @property string $email
 * @property string|null $gender
 *
 * @property Tasks[] $tasks
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date_of_birth', 'email'], 'required'],
            [['name', 'email', 'gender'], 'string'],
            [['date_of_birth'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'name' => 'Nome',
            'date_of_birth' => 'Data de Nascimento',
            'email' => 'Email',
            'gender' => 'Gênero',
        ];
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::class, ['user_id' => 'ID']);
    }

    public function getAllUsers()
    {
        $model = $this::find()->asArray()->all();

        return ArrayHelper::map($model, 'ID', 'name');
    }
}
