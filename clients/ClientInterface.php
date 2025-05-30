<?php

declare(strict_types=1);

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace AlexeiKaDev\Yii2User\clients;

use yii\authclient\ClientInterface as BaseInterface;

/**
 * Enhances default yii client interface by adding methods that can be used to
 * get user's email and username.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
interface ClientInterface extends BaseInterface
{
    /** @return string|null User's email */
    public function getEmail(): ?string;

    /** @return string|null User's username */
    public function getUsername(): ?string;
}
