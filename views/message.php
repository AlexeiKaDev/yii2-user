<?php
declare(strict_types=1);

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */


/**
 * @var yii\web\View $this
 * @var AlexeiKaDev\Yii2User\Module $module
 * @var string $title
 */

$this->title = $title;
?>

<?= $this->render('/_alert', ['module' => $module]);
