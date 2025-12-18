<?php

namespace App\DataFixtures;

use App\Entity\Review;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $brands = ['Apple', 'Samsung', 'Sony', 'Dell', 'Asus', 'Lenovo', 'HP', 'Bose'];
        $types = ['Laptop', 'Smartphone', 'Headphones', 'Smartwatch', 'Tablet'];
        $adjectives = ['Ultra', 'Pro', 'Max', 'Air', 'Elite', 'Gaming', 'X', 'Plus'];

        for ($i = 0; $i < 20; $i++) {
            $brand = $brands[array_rand($brands)];
            $type = $types[array_rand($types)];
            $adj = $adjectives[array_rand($adjectives)];

            // 1. Generate Title
            $title = "$brand $type $adj " . rand(2023, 2025);

            // 2. Generate Slug MANUALLY (This fixes the error)
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title))) . '-' . rand(1000, 9999);

            $review = new Review();
            $review->setTitle($title);
            $review->setSlug($slug); // <--- HERE IS THE FIX

            // Random price
            $review->setPrice((string)rand(200, 2500) . '.99');
            $review->setRating(rand(3, 5));
            $review->setIsPublished(true);
            $review->setAffiliateLink('https://www.emag.bg');

            // Images
            $review->setImageUrl("https://picsum.photos/seed/" . rand(1, 9999) . "/600/400");

            $review->setMetaDescription("Full review of the new $title.");

            // HTML Content
            $htmlContent = "
                <p>The <strong>$title</strong> is a beast. We tested it thoroughly.</p>
                <h3>Performance</h3>
                <p>It handles everything you throw at it.</p>

                <div class='row mt-4'>
                    <div class='col-md-6'>
                        <div class='alert alert-success'>
                            <strong>✅ Pros:</strong>
                            <ul><li>Fast</li><li>Great Screen</li></ul>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='alert alert-danger'>
                            <strong>❌ Cons:</strong>
                            <ul><li>Expensive</li></ul>
                        </div>
                    </div>
                </div>
            ";
            $review->setContent($htmlContent);

            $manager->persist($review);
        }

        $manager->flush();
    }
}
