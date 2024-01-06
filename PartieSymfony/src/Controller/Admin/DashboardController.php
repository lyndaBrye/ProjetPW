<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Contact;
use App\Entity\Educateur;
use App\Entity\Licencie;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator){
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(LicencieCrudController::class)
            ->generateUrl();
        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Club Sportif');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');
         yield MenuItem::linkToCrud('The Label', 'fas fa-list', Licencie::class);

         yield MenuItem::section('Categories');
        yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
          //  MenuItem::linkToCrud('Create category', 'fas fa-plus-circle', Categorie::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show category', 'fas fa-eye', Categorie::class),
        ]);
        yield MenuItem::section('Contact');

        yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
            //MenuItem::linkToCrud('Create Article', 'fas fa-plus-circle', Contact::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Articles', 'fas fa-eye', Contact::class),
        ]);

        yield MenuItem::section('Licencies');

        yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
        //    MenuItem::linkToCrud('Create Article', 'fas fa-plus-circle', Licencie::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Articles', 'fas fa-eye', Licencie::class),
        ]);

        yield MenuItem::section('Educateurs');

        yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
            //MenuItem::linkToCrud('Create Article', 'fas fa-plus-circle', Educateur::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Articles', 'fas fa-eye', Educateur::class),
        ]);


    }
}
