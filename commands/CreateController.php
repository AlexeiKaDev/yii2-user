<?php

declare(strict_types=1);

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace AlexeiKaDev\Yii2User\commands;

use AlexeiKaDev\Yii2User\models\User;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Creates new user account.
 *
 * @property \AlexeiKaDev\Yii2User\Module $module
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class CreateController extends Controller
{
    /**
     * This command creates new user account. If password is not set, this command will generate new 8-char password.
     * After saving user to database, this command uses mailer component to send credentials (username and password) to
     * user via email.
     *
     * @param string      $email    Email address
     * @param string      $username Username
     * @param string|null $password Password (if null it will be generated automatically)
     */
    public function actionIndex(string $email, string $username, ?string $password = null): void
    {
        /** @var User $user */
        $user = Yii::createObject([
            'class' => User::class,
            'scenario' => 'create',
            'email' => $email,
            'username' => $username,
            'password' => $password,
        ]);

        if ($user->create()) {
            $this->stdout(Yii::t('user', 'User has been created') . "!\n", Console::FG_GREEN);
        } else {
            $this->stdout(Yii::t('user', 'Please fix following errors:') . "\n", Console::FG_RED);

            foreach ($user->errors as $errors) {
                foreach ($errors as $error) {
                    $this->stdout(' - ' . $error . "\n", Console::FG_RED);
                }
            }
        }
    }
}
