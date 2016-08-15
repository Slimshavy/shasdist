<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Mesechta]].
 *
 * @see Mesechta
 */
class MesechtaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Mesechta[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Mesechta|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}