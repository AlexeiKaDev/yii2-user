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
 * @var AlexeiKaDev\Yii2User\models\User   $user
 * @var AlexeiKaDev\Yii2User\models\Token  $token
 */
?>
<?= Yii::t('user', 'Hello') ?>,

<?= Yii::t(
    'user',
    'We have received a request to change the email address for your account on {0}',
    Yii::$app->name
) ?>.
<?= Yii::t('user', 'In order to complete your request, please click the link below') ?>.

<?= $token->url ?>

<?= Yii::t('user', 'If you cannot click the link, please try pasting the text into your browser') ?>.

<?= Yii::t('user', 'If you did not make this request you can ignore this email') ?>.
