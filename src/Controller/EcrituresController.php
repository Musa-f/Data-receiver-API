<?php

namespace App\Controller;

use App\Entity\ComptesComptables;
use App\Entity\Ecritures;
use App\Entity\Journaux;
use App\Repository\ComptesComptablesRepository;
use App\Repository\EcrituresRepository;
use App\Repository\JournauxRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

class EcrituresController extends AbstractController
{
    #[Route('/api/ecritures/achats', name: 'getAllEcritures', methods: ['GET'])]
    public function getAllEcritures(EcrituresRepository $ecrituresRepository, SerializerInterface $serializer, Request $request): JsonResponse
    {
        $listEcritures = $ecrituresRepository->findAll();
        $jsonlistEcritures = $serializer->serialize($listEcritures, 'json', ['groups' => 'getEcritures']);
        return new JsonResponse($jsonlistEcritures, Response::HTTP_OK, [], true);
    }

    #[Route('/api/ecritures/achats', name: 'createEcriture', methods:['POST'])]
    public function createEcriture(Request $request, SerializerInterface $serializer, EntityManagerInterface $em)
    {
        $requestData = json_decode($request->getContent(), true);
        $journal = $em->getRepository(Journaux::class)->find(1);

        if($requestData['puAchat']){
            $compteAchat = $em->getRepository(ComptesComptables::class)->find($requestData['compteAchat']);
            $ecriture = new Ecritures();
            $ecriture->setCompte($compteAchat);
            $ecriture->setDebit($requestData['puAchat']);
            $ecriture->setIdPiece($requestData['idPiece']);
            $ecriture->setJournal($journal);
            $ecriture->setDateEcriture(new DateTime());

            $em->persist($ecriture);
            $em->flush();
        }
        if($requestData['tvaAchat']){
            $compteTVA = $em->getRepository(ComptesComptables::class)->find(445);
            $ecriture = new Ecritures();
            $ecriture->setCompte($compteTVA);
            $ecriture->setDebit($requestData['tvaAchat']);
            $ecriture->setIdPiece($requestData['idPiece']);
            $ecriture->setJournal($journal);
            $ecriture->setDateEcriture(new DateTime());

            $em->persist($ecriture);
            $em->flush();
        }
        if($requestData['totalAchat']){
            $compteFournisseur = $em->getRepository(ComptesComptables::class)->find(401);
            $ecriture = new Ecritures();
            $ecriture->setCompte($compteFournisseur);
            $ecriture->setCredit($requestData['totalAchat']);
            $ecriture->setIdPiece($requestData['idPiece']);
            $ecriture->setJournal($journal);
            $ecriture->setDateEcriture(new DateTime());

            $em->persist($ecriture);
            $em->flush();
        }
    
        $jsonBook = $serializer->serialize($ecriture, 'json', ['groups' => 'getEcritures']);
        return new JsonResponse($jsonBook, Response::HTTP_CREATED, [], true);
    }
    
}
