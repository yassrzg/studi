<?php

namespace App\Repository;

use App\Entity\RestaurantHours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * @extends ServiceEntityRepository<RestaurantHours>
 *
 * @method RestaurantHours|null find($id, $lockMode = null, $lockVersion = null)
 * @method RestaurantHours|null findOneBy(array $criteria, array $orderBy = null)
 * @method RestaurantHours[]    findAll()
 * @method RestaurantHours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RestaurantHoursRepository extends ServiceEntityRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, RestaurantHours::class);
        $this->entityManager = $entityManager;
    }

    public function save(RestaurantHours $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RestaurantHours $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return RestaurantHours[] Returns an array of RestaurantHours objects
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

    /**
     * @throws NonUniqueResultException
     */
    public function findHourAndDayByDay($value): \Doctrine\ORM\Query
    {
        $qb =  $this->createQueryBuilder('r');

        $qb->select("r.openHours, r.closeHours, r.jours")
            ->where('r.jours = :val')
            ->setParameter('val', $value);
        return $qb->getQuery();
    }
    /**
     */
    public function findHourAndDayByDay2($value)
    {
        $query = $this->entityManager->createQueryBuilder();
        $query->select('u')
            ->from(RestaurantHours::class, 'u')
            ->where('u.jours = :jours')
            ->setParameter('jours', $value);


        $qb = $query->getQuery();
        return $qb->execute();
    }
    public function findAllByDay()
    {
        $query = $this->entityManager->createQueryBuilder();
        $query->select('u')
            ->from(RestaurantHours::class, 'u');

        $qb = $query->getQuery();
        return $qb->execute();
    }

}


