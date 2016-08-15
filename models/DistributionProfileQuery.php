<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DistributionProfile]].
 *
 * @see DistributionProfile
 */
class DistributionProfileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return DistributionProfile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DistributionProfile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}