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
class m151218_234654_add_timezone_to_profile extends Migration
{
    public function up(): void
    {
        $this->addColumn('{{%profile}}', 'timezone', $this->string(40)->null());
    }

    public function down(): void
    {
        $this->dropcolumn('{{%profile}}', 'timezone');
    }
}
