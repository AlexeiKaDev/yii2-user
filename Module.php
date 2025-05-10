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

namespace AlexeiKaDev\Yii2User;

use yii\base\Module as BaseModule;
use yii\db\Connection;

/**
 * This is the main module class for the Yii2-user.
 *
 * @property array $modelMap
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class Module extends BaseModule
{
    public const VERSION = '1.0.0-alpha-bs5'; // Обновленная версия для форка

    /** Email is changed right after user enter's new email address. */
    public const STRATEGY_INSECURE = 0;

    /** Email is changed after user clicks confirmation link sent to his new email address. */
    public const STRATEGY_DEFAULT = 1;

    /** Email is changed after user clicks both confirmation links sent to his old and new email addresses. */
    public const STRATEGY_SECURE = 2;

    /** @var bool Whether to show flash messages. */
    public bool $enableFlashMessages = true;

    /** @var bool Whether to enable registration. */
    public bool $enableRegistration = true;

    /** @var bool Whether to remove password field from registration form. */
    public bool $enableGeneratingPassword = false;

    /** @var bool Whether user has to confirm his account. */
    public bool $enableConfirmation = true;

    /** @var bool Whether to allow logging in without confirmation. */
    public bool $enableUnconfirmedLogin = false;

    /** @var bool Whether to enable password recovery. */
    public bool $enablePasswordRecovery = true;

    /** @var bool Whether user can remove his account */
    public bool $enableAccountDelete = false;

    /** @var bool Enable the 'impersonate as another user' function */
    public bool $enableImpersonateUser = true;

    /** @var int Email changing strategy. */
    public int $emailChangeStrategy = self::STRATEGY_DEFAULT;

    /** @var int The time you want the user will be remembered without asking for credentials. */
    public int $rememberFor = 1209600; // two weeks

    /** @var int The time before a confirmation token becomes invalid. */
    public int $confirmWithin = 86400; // 24 hours

    /** @var int The time before a recovery token becomes invalid. */
    public int $recoverWithin = 21600; // 6 hours

    /** @var int Cost parameter used by the Blowfish hash algorithm. */
    public int $cost = 10;

    /** @var array An array of administrator's usernames. */
    public array $admins = [];

    /** @var string The Administrator permission name. */
    public ?string $adminPermission = null;

    /**
     * @var array Mailer configuration.
     * Contains the configuration for the Mailer component, passed to Yii::createObject().
     * For example: [
     *     'class' => Mailer::class, // or your custom Mailer class (AlexeiKaDev\Yii2User\Mailer)
     *     'viewPath' => '@AlexeiKaDev/Yii2User/views/mail', // Path to mail templates
     *     'sender' => 'no-reply@example.com', // Default sender address
     *     // other parameters specific to your Mailer class or yii\swiftmailer\Mailer
     * ]
     */
    public array $mailer = [];

    /** @var array Model map */
    public array $modelMap = [];

    /**
     * @var string The prefix for user module URL.
     *
     * @See [[GroupUrlRule::prefix]]
     */
    public string $urlPrefix = 'user';

    /**
     * @var bool Is the user module in DEBUG mode? Will be set to false automatically
     * if the application leaves DEBUG mode.
     */
    public bool $debug = false;

    /** @var string The database connection to use for models in this module. */
    public string $dbConnection = 'db';

    /** @var array The rules to be used in URL management. */
    public array $urlRules = [
        '<id:\d+>' => 'profile/show',
        '<action:(login|logout|auth)>' => 'security/<action>',
        '<action:(register|resend)>' => 'registration/<action>',
        'confirm/<id:\d+>/<code:[A-Za-z0-9_-]+>' => 'registration/confirm',
        'forgot' => 'recovery/request',
        'recover/<id:\d+>/<code:[A-Za-z0-9_-]+>' => 'recovery/reset',
        'settings/<action:\w+>' => 'settings/<action>'
    ];

    /**
     * @return Connection
     */
    public function getDb(): Connection
    {
        return \Yii::$app->get($this->dbConnection);
    }
}
