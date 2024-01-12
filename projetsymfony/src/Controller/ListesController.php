<?php
/*
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListesController extends AbstractController
{
    #[Route('/listes', name: 'app_listes')]
    public function index(): Response
    {
        return $this->render('listes/index.html.twig', [
            'controller_name' => 'ListesController',
        ]);
    }
}*/

// src/Controller/ListesController.php
// src/Controller/ListesController.php

// src/Controller/ListesController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categories;
use App\Entity\Contacts;
use App\Entity\Licencies;


// ...

use Doctrine\ORM\EntityManagerInterface;

class ListesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function listByCategory(EntityManagerInterface $entityManager): Response
    {
        // Utilise directement $entityManager pour accéder à l'Entity Manager
        $categories = $entityManager->getRepository(Categories::class)->findAll();

        return $this->render('listes/liste_categories.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/categorie/{categorieId}/licencies", name="lister_licencies_par_categorie")
     */
    public function listLicencieByCategory(int $categorieId, EntityManagerInterface $entityManager): Response
    {
        $categorie = $entityManager->getRepository(Categories::class)->find($categorieId);
        $licencies = $entityManager->getRepository(Licencies::class)->findLicencieByCategory($categorieId);

        if (!$categorie) {
            throw $this->createNotFoundException('La catégorie n\'existe pas.');
        }


        return $this->render('listes/liste_licencies_par_categorie.html.twig', [
            'categories' => $categorie,
            'licencies' => $licencies,
        ]);
    }

    /**
     * @Route("/categorie/{categorieId}/contacts", name="lister_contacts_par_categorie")
     */
    public function listContactByCategory(int $categorieId): Response
    {
        // Récupère la catégorie spécifique
        $categorie = $this->entityManager->getRepository(Categories::class)->find($categorieId);
        $contacts= $this->entityManager->getRepository(Contacts::class)->getContactByCategorie($categorieId);
        // Vérifie si la catégorie existe
        if (!$categorie) {
            throw $this->createNotFoundException('La catégorie n\'existe pas.');
        }

        // Passe les données à la vue
        return $this->render('listes/liste_contacts_par_categorie.html.twig', [
            'categorie' => $categorie,
            'contacts' => $contacts,
        ]);
    }


    // ...
}
