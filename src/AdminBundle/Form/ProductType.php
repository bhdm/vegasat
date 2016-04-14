<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
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
            ->add('code', null, ['attr' => ['placeholder' => 'Артикуль']])
            ->add('brand', null, ['attr' => ['placeholder' => 'Бренд']])
            ->add('model', null, ['attr' => ['placeholder' => 'Модель']])
            ->add('title', TextType::class, ['label' => 'Название'])
            ->add('slug', TextType::class, ['attr' => ['placeholder' => 'URL']])
            ->add('description', TextareaType::class, ['attr' => ['class' => 'ckeditor']])
            ->add('shortDescription', TextareaType::class, ['attr' => ['class' => 'ckeditor']])
            ->add('metaTitle', TextType::class, ['required' => false])
            ->add('metaKeyword', TextType::class, ['required' => false])
            ->add('metaDescription', TextType::class, ['required' => false])
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
