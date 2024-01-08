<?php
namespace App\Controller;
use App\Entity\MailContact;
use App\Repository\CategoriesRepository;
use App\Repository\ContactsRepository;
use App\Repository\EducateursRepository;
use App\Repository\LicenciesRepository;
use App\Repository\MailContactRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;

class MailContactController extends AbstractController
{
    private MailContactRepository $mailContactRepository;
    private ContactsRepository $contactRepository;
    private  EducateursRepository $educateursRepository;
    private LicenciesRepository $licencieRepository;
    private CategoriesRepository $categorieRepository;


    public function  __construct(CategoriesRepository $categorieRepository,EducateursRepository $educateursRepository,MailContactRepository $mailContactRepository,ContactsRepository $contactRepository){
        $this->mailContactRepository=$mailContactRepository;
        $this->contactRepository=$contactRepository;
        $this->categorieRepository=$categorieRepository;
        $this->educateursRepository=$educateursRepository;

    }

    #[Route('/mail/contact', name: 'app_mail_contact')]
    public function index(): Response
    {
        //  $userId = $this->getUser()->getId();
        $mails = $this->mailContactRepository->findByContactId(4);
        return $this->render('mail_contact/index.html.twig', [
            'mails' => $mails,
        ]);
    }

    #[Route('/mail/contact/delete/', name: 'app_mail_contact_delete')]
    public function delete(Request $request): Response
    {
        $id=$request->query->get('id');
       $this->mailContactRepository->deleteById($id);
        return $this->redirectToRoute('app_mail_contact');
    }

    #[Route(path: '/mail/contact/send', name: 'app_send_mail_contact')]
    public function sendMailContact(Request $request): Response {
        $categories = $this->categorieRepository->findAll();
        $form = $this->createFormBuilder()->add('objet', TextType::class, [
            'label' => 'Objet: ',
            'required' => true,
            'attr' => [
                'placeholder' => 'Objet...',
            ]])
            ->add('message', TextareaType::class, [
            'required' => true,
            'label' => 'Message: ',
            'attr' => [
                'placeholder' => 'Entrer votre message ici..',
            ]])->add('destinataire', ChoiceType::class, [
            'label' => 'Destinataire: ',
            'choices' => $categories,
            'choice_label' => 'nom',
            'choice_value' => 'id',
            'multiple' => true,
            'expanded' => false,
        ])->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $mail  = new MailContact();
            $mail->setObjet($data['objet']);
           $mail->setMessage($data['message']);
            $now = new DateTime();
            $mail->setDateEnvoie($now);

          //  $userId = $this->getUser()->getId(); a changer apres authentif

            $expediteur = $this->educateursRepository->findOneBy(['id'=> 4]);
            $mail->setExpediteur($expediteur);

            foreach ($data['destinataire'] as $categorie) {
                $contacts = $this->contactRepository->getContactByCategorie($categorie->getId());
                foreach ($contacts as $value) {
                    $mail->addDestinataire($value);
                }
            }

            $this->mailContactRepository->send($mail);
            return $this->redirectToRoute('app_mail_contact');
        }

        return $this->render('mail_contact/add.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    #[Route(path: '/mail/contact/view', name: 'app_view_mail_contact')]
    public function viewMailContact(Request $request): Response {
        $id = $request->query->get('id');
        $mail = $this->mailContactRepository->findOneBy(["id" => $id]);
        return $this->render('mail/contact/view.html.twig', [
            'mail' => $mail
        ]);
    }
}