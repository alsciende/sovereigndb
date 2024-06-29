<?php

namespace App\Repository;

use App\Entity\Card;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<Card>
 */
class CardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Card::class);
    }



    // protected function fieldExists($fieldName): bool
    // {
    //     $classMetadata = $this->getClassMetadata();
    //     return $classMetadata->hasField($fieldName) || $classMetadata->hasAssociation($fieldName);
    // }

    /**
    * @return Card[] Returns an array of Card objects
    */
    public function findBy(array $criteria, array|null $orderBy = ['id' => 'ASC'], ?int $limit = 100, ?int $offset = null): array
    {
        return parent::findBy($criteria, $orderBy, $limit, $offset);
    }
    
    /**
    * @return Card Returns a Card object
    */
    public function findById($id): Card
    {
        return $this->find($id);
    }

    /**
    * @return Card[] Returns an array of Card objects
    */
}
