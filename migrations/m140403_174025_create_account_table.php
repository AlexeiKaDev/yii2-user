<?php

declare(strict_types=1);

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use AlexeiKaDev\Yii2User\migrations\Migration;

/**
 * @author Dmitry Erofeev <dmeroff@gmail.com
 */
class m140403_174025_create_account_table extends Migration
{
    public function up(): void
    {
        $this->createTable('{{%account}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->null(),
            'provider' => $this->string()->notNull(),
            'client_id' => $this->string()->notNull(),
            'properties' => $this->text()->null(),
        ], $this->tableOptions);

        $this->createIndex('{{%account_unique}}', '{{%account}}', ['provider', 'client_id'], true);
        $this->addForeignKey('{{%fk_user_account}}', '{{%account}}', 'user_id', '{{%user}}', 'id', $this->cascade, $this->restrict);
    }

    public function down(): void
    {
        $this->dropTable('{{%account}}');
    }
}
