<?php

namespace App\Repository;

use App\Entity\Referentiel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Referentiel>
 *
 * @method Referentiel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Referentiel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Referentiel[]    findAll()
 * @method Referentiel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferentielRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Referentiel::class);
    }
    public function findAllWithPagination($page, $limit) {
        $qb = $this->createQueryBuilder('r')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit);
        return $qb->getQuery()->getResult();
    }

//    /**
//     * @return Referentiel[] Returns an array of Referentiel objects
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

//    public function findOneBySomeField($value): ?Referentiel
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
