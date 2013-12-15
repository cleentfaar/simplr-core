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

use Craue\FormFlowBundle\Form\FormFlow as BaseFormFlow;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

abstract class FormFlow extends BaseFormFlow
{
    protected $allowDynamicStepNavigation = true;

    /**
     * @var FormTypeInterface
     */
    protected $formType;

    public function setFormType(FormTypeInterface $formType)
    {
        $this->formType = $formType;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                 'translation_domain' => 'installation'
            )
        );
    }
}
