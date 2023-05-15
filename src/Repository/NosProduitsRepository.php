<?php

namespace App\Repository;

use App\Entity\Categorie;
use App\Entity\NosProduits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NosProduits>
 *
 * @method NosProduits|null find($id, $lockMode = null, $lockVersion = null)
 * @method NosProduits|null findOneBy(array $criteria, array $orderBy = null)
 * @method NosProduits[]    findAll()
 * @method NosProduits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NosProduitsRepository extends ServiceEntityRepository
{


    public function __construct(ManagerRegistry $registry )
    {
        parent::__construct($registry, NosProduits::class);

    }

    public function save(NosProduits $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(NosProduits $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return NosProduits[] Returns an array of NosProduits objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NosProduits
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }



}
