<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Form\AppointmentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



class AppointmentController extends AbstractController
{
    #[Route('/appointment', name: 'app_appointment')]
    #[IsGranted("ROLE_USER")]
    public function index(Request $request, EntityManagerInterface $entityManager, Security $security, SessionInterface $session): Response
    {
        $user = $security->getUser();
        $appointment = new Appointment();
        $appointment->setUser($user);
        $appointment->setStatus("En attente");
        $form = $this->createForm(AppointmentType::class, $appointment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($appointment);
            $entityManager->flush();

            $this->addFlash('success', 'The appointment request has been made, our teams will get back to you shortly.');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('appointment/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/my-appointments', name: 'app_my-appointment')]
    public function listAppointments(EntityManagerInterface $entityManager, Security $security)
    {
        $user = $security->getUser();
        $appointments = $entityManager->getRepository(Appointment::class)->findBy(['user' => $user]);

        // dd($appointments);

        return $this->render('appointment/my-appointments.html.twig', [
            'appointments' => $appointments,
        ]);
    }
}
