<?php

use yii\db\Migration;

/**
 * Class m221204_203716_drop_unique_login_index
 */
class m221204_203716_drop_unique_login_index extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropIndex('UI_login', 'user');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221204_203716_drop_unique_login_index cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221204_203716_drop_unique_login_index cannot be reverted.\n";

        return false;
    }
    */
}
