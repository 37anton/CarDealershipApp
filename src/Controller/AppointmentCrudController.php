<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Form\Appointment1Type;
use App\Repository\AppointmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/appointment/crud')]
class AppointmentCrudController extends AbstractController
{
    #[Route('/', name: 'app_appointment_crud_index', methods: ['GET'])]
    public function index(AppointmentRepository $appointmentRepository): Response
    {
        return $this->render('appointment_crud/index.html.twig', [
            'appointments' => $appointmentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_appointment_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AppointmentRepository $appointmentRepository): Response
    {
        $appointment = new Appointment();
        $form = $this->createForm(Appointment1Type::class, $appointment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $appointmentRepository->save($appointment, true);

            return $this->redirectToRoute('app_appointment_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('appointment_crud/new.html.twig', [
            'appointment' => $appointment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_appointment_crud_show', methods: ['GET'])]
    public function show(Appointment $appointment): Response
    {
        return $this->render('appointment_crud/show.html.twig', [
            'appointment' => $appointment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_appointment_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Appointment $appointment, AppointmentRepository $appointmentRepository): Response
    {


        $form = $this->createForm(Appointment1Type::class, $appointment);
        $form->handleRequest($request);

        $user = $this->getUser();
        // dd($user);


        if ($form->isSubmitted() && $form->isValid()) {
            $appointmentRepository->save($appointment, true);

            return $this->redirectToRoute('app_appointment_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('appointment_crud/edit.html.twig', [
            'appointment' => $appointment,
            'form' => $form,
            'user' => $user,
        ]);
    }

    #[Route('/{id}', name: 'app_appointment_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Appointment $appointment, AppointmentRepository $appointmentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $appointment->getId(), $request->request->get('_token'))) {
            $appointmentRepository->remove($appointment, true);
        }

        return $this->redirectToRoute('app_appointment_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
