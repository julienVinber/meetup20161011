<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 06/10/2016
 * Time: 19:07
 */

namespace AppBundle\Form;

use AppBundle\Entity\Adresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MembreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('mail')
            ->add('telephone')
            ->add('dateNaissance', BirthdayType::class)
            ->add('etatMembre')
            ->add('adresse', CollectionType::class, array(
                'entry_type' => AdresseType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
            ))
            ->add('cree', SubmitType::class, array('label' => 'Valider'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Membre'
        ));
    }
}