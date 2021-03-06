<?php

/*
 * This file is part of the PHP MailChimp.
 *
 * (c) Joshua Clifford Reyes <reyesjoshuaclifford@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPMailChimp\Core\Utilities;

use PHPMailChimp\Core\Utilities\MailChimpConfig;

/**
 * The MailChimp Host.
 * 
 * @author Joshua Clifford Reyes <reyesjoshuaclifford@gmail.com>
 */
class MailChimpHost
{
    /**
     * The primary url for subscriber api.
     *
     * @param  string  $apiKey  The key will only be generated to the user settings.
     *
     * @return string
     */
    public static function resolve($apiKey)
    {
        $dataCenter = self::getDataCenter($apiKey);

        return MailChimpConfig::MAILCHIMP_PROTOCOL . "://{$dataCenter}." . 
               MailChimpConfig::MAILCHIMP_HOST . '/' . 
               MailChimpConfig::MAILCHIMP_API_VERSION; 
    }

    /**
     * Determine the mailchimp api data center.
     *
     * @param  string  $apiKey
     *
     * @return string
     */
    protected static function getDataCenter($apiKey)
    {
        return substr($apiKey, strpos($apiKey, '-') + 1);
    }
}