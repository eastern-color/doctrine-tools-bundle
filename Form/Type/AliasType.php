<?php

namespace EasternColor\DoctrineToolsBundle\Form\Type;

use EasternColor\DoctrineToolsBundle\Form\Type\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class AliasType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'attr' => ['maxlength' => 50],
            'constraints' => [
               new NotBlank(),
               new Length(['min' => 3, 'max' => 50]),
               new Regex(['pattern' => "/^[a-z0-9\-_\.]+$/"]),
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['sonata_help'] = 'This value can contains ONLY alphanumeric(a-z, 0-9) or hyphen (-). Maximum 50 characters.';
    }

    public function getParent()
    {
        return TextType::class;
    }
}
