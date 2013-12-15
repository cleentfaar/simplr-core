<?php

/*
 * This file is part of the Simplr package.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cleentfaar\Simplr\Core\Form;

use Craue\FormFlowBundle\Form\FormFlowInterface;

class InstallCmsFormFlow extends FormFlow
{
    public function getName()
    {
        return 'installCms';
    }

    protected function loadStepsConfig()
    {
        return array(
            array(
                'label' => 'form.step.site_settings',
                'type' => $this->formType,
            ),
            array(
                'label' => 'form.step.database_configuration',
                'type' => $this->formType,
            ),
            array(
                'label' => 'form.step.confirm',
            ),
        );
    }
}
