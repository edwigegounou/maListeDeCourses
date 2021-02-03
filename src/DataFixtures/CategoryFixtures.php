<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\Self_;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = [
        'fruits' => [
            'picture' => 'https://www.cjoint.com/doc/21_02/KBdmvkFw6DX_pngtree-delicious-fruit-orange-cartoon-food-png-
            image-423866-removebg-preview.png'
        ],
        'légumes' => [
            'picture' =>'https://www.cjoint.com/doc/21_02/KBdmLi2gIFX_kisspng-drawing-vegetable-fruit-clip-art-
            vegetable-field-5b57e7ebdd9c14.3135972515324876599077-removebg-preview.png'
        ],
        'boissons' => [
            'picture' => 'https://www.cjoint.com/doc/21_02/KBdmQqTYtQX_68810347-vector-illustration-avec-dessin-
            anim%C3%A9-boissons-non-alcoolis%C3%A9es-ic%C3%B4nes-lunettes-avec-des-boissons-de-dessin--removebg-preview.png'
        ],
        'produits laitiers' => [
            'picture' => 'https://www.cjoint.com/doc/21_02/KBdmT623MVX_41ea54e71a551049016fa6b784aafb29-removebg-preview.png'
        ],
        'boulangerie' => [
            'picture' => 'https://www.cjoint.com/doc/21_02/KBdmWEBfmCX_elements-boulangerie-dessin-anime-illustration-
            forme-cercle-80590-5539-removebg-preview.png'
        ],
        'viandes/poissons' => [
            'picture' => 'https://www.cjoint.com/doc/21_02/KBdnqMJjewX_istockphoto-490504850-170667a-removebg-preview.png'
        ],
        'épicerie' => [
            'picture' => 'https://www.cjoint.com/doc/21_02/KBdnfuH80vX_91263157-ensemble-de-nourriture-en-conserve-
            repas-conserv%C3%A9-dans-un-r%C3%A9cipient-en-m%C3%A9tal-et-en-verre-sur-une-%C3%A9tag%C3%A8re-dans--removebg-preview.png'
        ],
        'condiments' => [
            'picture' => 'https://www.cjoint.com/doc/21_02/KBdnjMoCqeX_88134348-vector-dessin-anim%C3%A9-plat-croquis-
            dessin%C3%A9s-%C3%A0-la-main-%C3%A9pices-assaisonnement-ar%C3%B4mes-et-ensemble-d-herbes-de-cui-removebg-preview.png'
        ],
        'autres' => [
            'picture' => 'https://www.cjoint.com/doc/21_02/KBdnvkfF31X_pngtree-hygiene-illustration-of-laundry-
            detergent-image-1459499-removebg-preview.png'
        ]
    ];
    public function load(ObjectManager $manager)
    {
        $i=0;
        foreach (self::CATEGORIES as $name => $data) {
        $category = new Category();
        $category->setName($name);
        $category->setPicture($data['picture']);
        $manager->persist($category);
        $this->addReference('category_' . $i, $category);
        $i++;
        }
        $manager->flush();
    }
}
