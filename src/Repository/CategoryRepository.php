<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Category>
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * Get all root categories (categories without parent)
     * @return Category[]
     */
    public function findRootCategories(): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.parent IS NULL')
            ->orderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find category by slug
     */
    public function findBySlug(string $slug): ?Category
    {
        return $this->findOneBy(['slug' => $slug]);
    }

    /**
     * Get category tree as hierarchical array
     */
    public function getCategoryTree(): array
    {
        $rootCategories = $this->findRootCategories();
        $tree = [];

        foreach ($rootCategories as $root) {
            $tree[] = $this->buildCategoryNode($root);
        }

        return $tree;
    }

    private function buildCategoryNode(Category $category): array
    {
        $node = [
            'id' => $category->getId(),
            'name' => $category->getName(),
            'slug' => $category->getSlug(),
            'children' => [],
        ];

        foreach ($category->getChildren() as $child) {
            $node['children'][] = $this->buildCategoryNode($child);
        }

        return $node;
    }
}
