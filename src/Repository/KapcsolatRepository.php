<?php

namespace App\Repository;

use App\Entity\Kapcsolat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Kapcsolat>
 *
 * @method Kapcsolat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kapcsolat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kapcsolat[]    findAll()
 * @method Kapcsolat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KapcsolatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kapcsolat::class);
    }

    public function save(Kapcsolat $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Kapcsolat $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Kapcsolat[] Returns an array of Kapcsolat objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Kapcsolat
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
