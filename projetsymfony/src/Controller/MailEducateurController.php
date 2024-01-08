<?php

namespace App\Controller;

use App\Entity\MailContact;
use App\Entity\MailEdu;
use App\Repository\CategoriesRepository;
use App\Repository\ContactsRepository;
use App\Repository\EducateursRepository;
use App\Repository\LicenciesRepository;
use App\Repository\MailContactRepository;
use App\Repository\MailEduRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;


class MailEducateurController extends AbstractController
{
    private MailContactRepository $mailContactRepository;
    private MailEduRepository $mailEduRepository;
    private ContactsRepository $contactRepository;
    private  EducateursRepository $educateursRepository;
    private CategoriesRepository $categorieRepository;


    public function  __construct(
        MailContactRepository $mailContactRepository,
        CategoriesRepository $categorieRepository,
        EducateursRepository $educateursRepository,
        ContactsRepository $contactRepository,
        MailEduRepository $mailEduRepository
    ){
        $this->mailContactRepository=$mailContactRepository;
        $this->mailEduRepository=$mailEduRepository;

        $this->contactRepository=$contactRepository;
        $this->categorieRepository=$categorieRepository;
        $this->educateursRepository=$educateursRepository;

    }


    #[Route('/mail/educateur', name: 'app_mail_educateur')]
    public function index(): Response
    {
        //$userId = $this->getUser()->getId();
        $mails = $this->mailEduRepository->getByEducateurId(4);
        return $this->render('mail_educateur/index.html.twig', ["mails" => $mails]);

    }



    #[Route(path: '/mail/send', name: 'app_send_mail_educateur')]
    public function sendMailEducateur(Request $request): Response {
        $educateurs = $this->educateursRepository->findAll();
        $form = $this->createFormBuilder()->add('objet', TextType::class, [
            'label' => 'Objet: ',
            'required' => true,
            'attr' => [
                'placeholder' => 'Objet...',
            ]])
          /*  ->add('message', TextareaType::class, [
            'required' => true,
            'label' => 'Message: ',
            'attr' => [
                'placeholder' => 'Entrer votre message ici..',
            ]])*/
            ->add('destinataire', ChoiceType::class, [
            'label' => 'Destinataire: ',
            'choices' => $educateurs,
            'choice_label' => 'email',
            'choice_value' => 'id',
            'multiple' => true,
            'expanded' => false,
        ])->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $mail  = new MailEdu();
            $mail->setObjet($data['objet']);
          //  $mail->setMessage($data['message']);
            $now = new DateTime();
            $mail->setDateEnvoi($now);

         //   $userId = $this->getUser()->getId();
            $expediteur = $this->educateursRepository->findOneBy(['id'=> 4]);
            $mail->setExpediteur($expediteur);

            foreach ($data['destinataire'] as $value) {
                $mail->addDestinataire($value);
            }
            $this->mailEduRepository->send($mail);
            return $this->redirectToRoute('app_mail_educateur');
        }

        return $this->render('mail_educateur/addMessageEducateur.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    #[Route(path: '/mail/delete', name: 'app_delete_mail_educateur')]
    public function deleteMailEducateur(Request $request): Response {
        $id = $request->query->get('id');
        $this->mailEduRepository->deleteById($id);
        return $this->redirectToRoute('app_mail_educateur');
    }
}
