<?php

/*
 * This file is part of the Simplr package.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cleentfaar\Simplr\Core\Controller\Install;

use Cleentfaar\Simplr\Core\Controller\BaseInstallController;

class WelcomeController extends BaseInstallController
{
    public function indexAction()
    {
        return $this->render('CleentfaarSimplrCmsBundle:Install:welcome.html.twig');
    }
}
