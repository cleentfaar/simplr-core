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
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\TranslatorInterface;

class InstallCmsForm extends Form
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flow_step']) {
            case 1:
                $builder->add(
                    'site_title',
                    'text',
                    array(
                         'label' => 'form.label.site_title',
                         'attr' => array(
                            'help_text' => 'form.help.site_title',
                             'placeholder' => $this->translator->trans('form.placeholder.site_title', array(), 'installation'),
                         ),
                    )
                );
                $builder->add(
                    'site_url',
                    'url',
                    array(
                         'label' => 'form.label.site_url',
                         'data' => $this->request->getSchemeAndHttpHost(),
                         'attr' => array(
                            'help_text' => 'form.help.site_url',
                             'placeholder' => $this->request->getSchemeAndHttpHost(),
                         ),
                    )
                );
                break;
            case 2:
                $availableDrivers = \PDO::getAvailableDrivers();
                $choices = array();
                foreach ($availableDrivers as $driver) {
                    $choices[$driver] = 'form.choice.database_driver.' . $driver;
                }
                $builder->add(
                    'database_driver',
                    'choice',
                    array(
                         'label' => 'form.label.database_driver',
                         'empty_value' => 'form.empty_choice.database_driver',
                         'choices' => $choices,
                         'attr' => array(
                            'help_text' => 'form.help.database_driver',
                         )
                    )
                );
                break;
        }
     /*   $builder->add(
            'button_submit',
            'button',
            array(
                'label' => 'form.button.next',
            )
        );
        $builder->add(
            'button_reset',
            'reset',
            array(
                'label' => 'form.button.reset',
            )
        );
        $builder->add(
            'button_back',
            'button',
            array(
                'label' => 'form.button.back',
            )
        );*/
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'installCms';
    }
}
