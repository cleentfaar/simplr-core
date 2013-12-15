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

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\TranslatorInterface;

abstract class Form extends AbstractType
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->request = $container->get('request');
        $this->translator = $container->get('translator');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                 'translation_domain' => 'installation'
            )
        );
    }
}
