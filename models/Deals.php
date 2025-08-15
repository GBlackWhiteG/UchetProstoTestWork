<?php

namespace app\models;

use yii\db\ActiveRecord;

class Deals extends ActiveRecord
{
    private $name;
    private $cost;

    public function rules()
    {
        return [
            [['name', 'cost'], 'required'],
            ['name', 'string'],
            ['cost', 'number'],
        ];
    }

    public function getContacts()
    {
        return $this->hasMany(Contacts::class, ['id' => 'contact_id'])
            ->viaTable('deal_contact', ['deal_id' => 'id']);
    }
}