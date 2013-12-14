<?php

/*
 * This file is part of the Simplr package.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cleentfaar\Simplr\Core;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Simplr
{
    /**
     * @var string
     */
    private $rootDir;

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;

    /**
     * @param string             $rootDir
     * @param ContainerInterface $container
     */
    public function __construct($rootDir, ContainerInterface $container)
    {
        if (!is_dir($rootDir)) {
            throw new \Exception(sprintf("Given directory '%s' does not exist", $rootDir));
        }
        $this->rootDir = $rootDir;
        $this->container = $container;
    }

    public function isInstalled()
    {
        $installationLockPath = $this->getInstallationLockPath();

        return $installationLockPath === null ? true : false;
    }

    public function getInstallationLockPath()
    {
        $path = realpath($this->rootDir . '/NOT_INSTALLED.lock') ;
        if ($path !== false) {
            return $path;
        }

        return null;
    }
}
