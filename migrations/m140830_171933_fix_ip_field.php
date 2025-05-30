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
class m140830_171933_fix_ip_field extends Migration
{
    public function up(): void
    {
        $this->alterColumn('{{%user}}', 'registration_ip', $this->bigInteger());
    }

    public function down(): void
    {
        $this->alterColumn('{{%user}}', 'registration_ip', $this->integer());
    }
}
