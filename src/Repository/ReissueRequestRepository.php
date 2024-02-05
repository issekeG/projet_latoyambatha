<?php

namespace App\Repository;

use App\Entity\ReissueRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReissueRequest>
 *
 * @method ReissueRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReissueRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReissueRequest[]    findAll()
 * @method ReissueRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReissueRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReissueRequest::class);
    }

//    /**
//     * @return ReissueRequest[] Returns an array of ReissueRequest objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReissueRequest
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
