<?php

namespace App\Repository;

use App\Entity\SonataMediaMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SonataMediaMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method SonataMediaMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method SonataMediaMedia[]    findAll()
 * @method SonataMediaMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SonataMediaMediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SonataMediaMedia::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SonataMediaMedia $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(SonataMediaMedia $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return SonataMediaMedia[] Returns an array of SonataMediaMedia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SonataMediaMedia
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
