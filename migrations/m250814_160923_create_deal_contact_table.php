<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%deal_contact}}`.
 */
class m250814_160923_create_deal_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%deal_contact}}', [
            'deal_id' => $this->integer()->notNull(),
            'contact_id' => $this->integer()->notNull(),
            'PRIMARY KEY(deal_id, contact_id)',

            'FOREIGN KEY(deal_id) REFERENCES deals(id) ON DELETE CASCADE',
            'FOREIGN KEY(contact_id) REFERENCES contacts(id) ON DELETE CASCADE',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-deal_contact-deal_id', '{{%deal_contact}}');
        $this->dropForeignKey('fk-deal_contact-contact_id', '{{%deal_contact}}');
        $this->dropTable('{{%deal_contact}}');
    }
}
