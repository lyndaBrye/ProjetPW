<?php
/*
namespace App\Repository;

use App\Entity\Categories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categories>
 *
 * @method Categories|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categories|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categories[]    findAll()
 * @method Categories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
/*
class CategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categories::class);
    }

//    /**
//     * @return Categories[] Returns an array of Categories objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Categories
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
//}

// src/Repository/CategorieRepository.php
namespace App\Repository;

use App\Entity\Categories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categories::class);
    }
    /**
     * Récupère une catégorie avec ses licenciés
     *
     * @param int $categorieId L'ID de la catégorie
     * @return Categorie|null La catégorie avec ses licenciés ou null si non trouvée
     */

   /* public function findCategorieWithLicencies(int $categorieId): ?Categories
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.licencies', 'l')
            ->addSelect('l')
            ->where('c.id = :id')
            ->setParameter('id', $categorieId)
            ->getQuery()
            ->getResult();
    }*/

     /**
     * Récupère une catégorie avec ses contacts
     *
     * @param int $categorieId L'ID de la catégorie
     * @return Categories|null La catégorie avec ses contacts ou null si non trouvée
     */


    public function getContactByCategorie(int $categorieId): array
    {
        return $this->createQueryBuilder('c')
      //      ->select('contacts')
            ->leftJoin('c.licencie_id', 'l')
            ->addSelect('l')
            ->leftJoin('l.contact_id', 'contacts')
            ->addSelect('contacts')
            ->where('c.id = :id')
            ->setParameter('id', $categorieId)
            ->getQuery()
            ->getOneOrNullResult();
    }
}

