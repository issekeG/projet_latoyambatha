<?php

namespace App\Controller;

use App\Entity\ReissueRequest;
use App\Entity\User;
use App\Form\ReissueRequestType;
use App\Form\ReissueRequestType1;
use App\Repository\ReissueRequestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/reissue')]
class ReissueRequestController extends AbstractController
{
    #[Route('/', name: 'app_reissue_request_index', methods: ['GET'])]
    public function index(ReissueRequestRepository $reissueRequestRepository): Response
    {
        return $this->render('reissue_request/dashboard.html.twig', [
            'reissue_requests' => $reissueRequestRepository->findAll(),
        ]);
    }

    #[Route('update/{status}', name: 'dashboard_status', methods: ['GET'])]
    public function showShoesByStatus(ReissueRequestRepository $reissueRequestRepository, $status): Response
    {
        return $this->render('reissue_request/dashboard.html.twig', [
            'reissue_requests' => $reissueRequestRepository->findBy(['status' => $status])
        ]);
    }

    #[Route('update/{status}/{id}', name: 'update_status', methods: ['GET','POST'])]
    public function updateStatus(ReissueRequestRepository $reissueRequestRepository, $status, $id, EntityManagerInterface $entityManager) : Response
    {

        $id = (int)$id;
        $shoes = $reissueRequestRepository->find($id);

        if (!$shoes) {
            throw $this->createNotFoundException('ReissueRequest not found with id ' . $id);
        }

        $shoes->setStatus($status);

        $entityManager->flush();

        return $this->redirectToRoute('app_reissue_request_index');

    }


    #[Route('/form', name: 'app_reissue_request_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,  MailerInterface $mailer): Response
    {

        $user = $this->getUser();

        if ($user instanceof User){
            $reissueRequest = new ReissueRequest();
            $form = $this->createForm(ReissueRequestType::class, $reissueRequest);
            $form->handleRequest($request);
        }else{

            $reissueRequest = new ReissueRequest();
            $form = $this->createForm(ReissueRequestType1::class, $reissueRequest);
            $form->handleRequest($request);

        }

        if ($form->isSubmitted()) {
            if($form->isValid()) {
            $entityManager->persist($reissueRequest);
            $entityManager->flush();
            $message = "Registration was completed successfully";

                if ($user instanceof User){
                    $user_email = $user->getEmail();

                    $email = (new Email())

                        #Replace with the address that should send the emails
                        ->from('gickelisseke@gmail.com')

                        ->to($user_email)

                        #Replace with your Mail Subject!
                        ->subject('subject!')

                        #Replace with your Mail Content !
                        ->text('content')

                        #Replace with your Mail Content in HTML format!
                        ->html('<p>Replace content in html format !!!!!!!</p>');

                    $mailer->send($email);
                }

            return $this->redirectToRoute('app_reissue_request_new', ['message'=>$message,], Response::HTTP_SEE_OTHER);
        }
            else{
                $message = "Registration failed, please check the form and try again";
                return $this->redirectToRoute('app_reissue_request_new', ['message'=>$message,]);

            }
        }
        $message = "";
        return $this->render('reissue_request/new.html.twig', [
            'reissue_request' => $reissueRequest,
            'form' => $form,
            'message'=>$message,
        ]);
    }

    #[Route('/{id}', name: 'app_reissue_request_show', methods: ['GET'])]
    public function show(ReissueRequest $reissueRequest): Response
    {
        return $this->render('reissue_request/show.html.twig', [
            'reissue_request' => $reissueRequest,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reissue_request_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReissueRequest $reissueRequest, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReissueRequestType::class, $reissueRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {

            if ($form->isValid()) {
                $entityManager->flush();
                $message = "Registration was completed successfully";

                return $this->redirectToRoute('app_reissue_request_index', ['message'=>$message,], Response::HTTP_SEE_OTHER);
            }
            else{
                $message = "Registration failed, please check the form and try again";
                return $this->redirectToRoute('app_reissue_request_index', ['message'=>$message,]);

            }
        }

        $message = "";
        return $this->render('reissue_request/edit.html.twig', [
            'reissue_request' => $reissueRequest,
            'form' => $form,
            'message'=>$message,
        ]);
    }

    #[Route('/{id}', name: 'app_reissue_request_delete', methods: ['POST'])]
    public function delete(Request $request, ReissueRequest $reissueRequest, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reissueRequest->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reissueRequest);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reissue_request_index', [], Response::HTTP_SEE_OTHER);
    }
}
