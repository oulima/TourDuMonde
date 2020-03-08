<?php

namespace App\Repository;

use App\Entity\EventSubscriber;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EventSubscriber|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventSubscriber|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventSubscriber[]    findAll()
 * @method EventSubscriber[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventSubscriberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventSubscriber::class);
    }

    // /**
    //  * @return EventSubscriber[] Returns an array of EventSubscriber objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EventSubscriber
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
