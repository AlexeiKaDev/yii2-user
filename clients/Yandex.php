<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace AlexeiKaDev\Yii2User\clients;

use Yii;
use yii\authclient\clients\Yandex as BaseYandex;

/**
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class Yandex extends BaseYandex implements ClientInterface
{
    /** @inheritdoc */
    public function getEmail(): ?string
    {
        $emails = isset($this->getUserAttributes()['emails'])
            ? $this->getUserAttributes()['emails']
            : null;

        if ($emails !== null && isset($emails[0])) {
            return $emails[0];
        } else {
            return null;
        }
    }

    /** @inheritdoc */
    public function getUsername(): ?string
    {
        return isset($this->getUserAttributes()['login'])
            ? $this->getUserAttributes()['login']
            : null;
    }

    /** @inheritdoc */
    protected function defaultTitle()
    {
        return Yii::t('user', 'Yandex');
    }
}
