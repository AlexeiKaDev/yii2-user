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
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class m150623_212711_fix_username_notnull extends Migration
{
    public function up(): void
    {
        if ($this->dbType == 'pgsql') {
            $this->alterColumn('{{%user}}', 'username', 'SET NOT NULL');
        } else {
            if ($this->dbType == 'sqlsrv') {
                $this->dropIndex('{{%user_unique_username}}', '{{%user}}');
            }
            $this->alterColumn('{{%user}}', 'username', $this->string(255)->notNull());

            if ($this->dbType == 'sqlsrv') {
                $this->createIndex('{{%user_unique_username}}', '{{%user}}', 'username', true);
            }
        }
    }

    public function down(): void
    {
        if ($this->dbType == "pgsql") {
            $this->alterColumn('{{%user}}', 'username', 'DROP NOT NULL');
        } else {
            if ($this->dbType == 'sqlsrv') {
                $this->dropIndex('{{%user_unique_username}}', '{{%user}}');
            }
            $this->alterColumn('{{%user}}', 'username', $this->string(255)->null());

            if ($this->dbType == 'sqlsrv') {
                $this->createIndex('{{%user_unique_username}}', '{{%user}}', 'username', true);
            }
        }
    }
}
