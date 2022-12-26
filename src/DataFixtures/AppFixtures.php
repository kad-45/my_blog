<?php

namespace App\DataFixtures;

use App\Entity\Option;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $options[] = new Option('Titre du blog', 'blog_title', 'Mon blog', TextType::class);
        $options[] = new Option('Text du copyright', 'blog_copyright', 'Tous droits réservés', TextType::class);
        $options[] = new Option("Nombre d'articles par page", "blog_articles_limit", 5, NumberType::class);
        $options[] = new Option("Tous le monde peu s'inscrire", "users_can_register", true, CheckboxType::class);

        foreach ($options as $option) {
            $manager->persist($option);
        }

        $manager->flush();



    }
}
