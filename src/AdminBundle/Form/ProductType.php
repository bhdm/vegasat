<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', null, ['attr' => ['placeholder' => '']])
            ->add('brand', null, ['attr' => ['placeholder' => '']])
            ->add('model', null, ['attr' => ['placeholder' => '']])
            ->add('title', TextType::class, ['label' => ''])
            ->add('slug', TextType::class, ['attr' => ['placeholder' => '']])
            ->add('description', TextareaType::class, ['attr' => ['class' => 'ckeditor']])
            ->add('shortDescription', TextareaType::class, ['attr' => ['class' => 'ckeditor']])
            ->add('metaTitle', TextType::class, ['required' => false])
            ->add('metaKeyword', TextareaType::class, ['required' => false])
            ->add('metaDescription', TextareaType::class, ['required' => false])
            ->add('enabled', CheckboxType::class,['required' => false, 'label' => ' '])
//            ->add('price', IntegerType::class)
//            ->add('priceSale', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Product',
        ]);
    }

    public function getName()
    {
        return 'admin_bundle_product_type';
    }
}
