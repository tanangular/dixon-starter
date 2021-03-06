<?php

namespace api\modules\v1\models;

/**
 * This is the ActiveQuery class for [[Todo]].
 *
 * @see Todo
 */
class TodoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Todo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Todo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}