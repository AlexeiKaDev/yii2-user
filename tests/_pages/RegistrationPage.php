<?php

namespace tests\_pages;

use yii\codeception\BasePage;

/**
 * Represents registration page.
 *
 * @property \FunctionalTester $actor
 */
class RegistrationPage extends BasePage
{
    /** @inheritdoc */
    public $route = '/user/registration/register';

    /**
     * @param string $email
     * @param string|null $username
     * @param string|null $password
     */
    public function register(string $email, ?string $username = null, ?string $password = null): void
    {
        $this->actor->fillField('#register-form-email', $email);
        $this->actor->fillField('#register-form-username', $username);

        if ($password !== null) {
            $this->actor->fillField('#register-form-password', $password);
        }
        $this->actor->click('Sign up');
    }
}
