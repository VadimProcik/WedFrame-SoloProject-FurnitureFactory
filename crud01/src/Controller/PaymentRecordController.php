<?php

namespace App\Controller;

use App\Entity\PaymentRecord;
use App\Form\PaymentRecordType;
use App\Repository\PaymentRecordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/payment/record')]
class PaymentRecordController extends AbstractController
{
    #[Route('/', name: 'app_payment_record_index', methods: ['GET'])]
    public function index(PaymentRecordRepository $paymentRecordRepository): Response
    {
        return $this->render('payment_record/index.html.twig', [
            'payment_records' => $paymentRecordRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_payment_record_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PaymentRecordRepository $paymentRecordRepository): Response
    {
        $paymentRecord = new PaymentRecord();
        $form = $this->createForm(PaymentRecordType::class, $paymentRecord);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $paymentRecordRepository->save($paymentRecord, true);

            return $this->redirectToRoute('app_payment_record_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('payment_record/new.html.twig', [
            'payment_record' => $paymentRecord,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_payment_record_show', methods: ['GET'])]
    public function show(PaymentRecord $paymentRecord): Response
    {
        return $this->render('payment_record/show.html.twig', [
            'payment_record' => $paymentRecord,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_payment_record_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PaymentRecord $paymentRecord, PaymentRecordRepository $paymentRecordRepository): Response
    {
        $form = $this->createForm(PaymentRecordType::class, $paymentRecord);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $paymentRecordRepository->save($paymentRecord, true);

            return $this->redirectToRoute('app_payment_record_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('payment_record/edit.html.twig', [
            'payment_record' => $paymentRecord,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_payment_record_delete', methods: ['POST'])]
    public function delete(Request $request, PaymentRecord $paymentRecord, PaymentRecordRepository $paymentRecordRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paymentRecord->getId(), $request->request->get('_token'))) {
            $paymentRecordRepository->remove($paymentRecord, true);
        }

        return $this->redirectToRoute('app_payment_record_index', [], Response::HTTP_SEE_OTHER);
    }
}
