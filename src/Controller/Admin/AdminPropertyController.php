<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropertyController extends AbstractController
{
    /**
     * @route("/admin", name="admin.property.index")
     * @param PropertyRepository $propertyRepository
     * @return Response
     */
    public function index(PropertyRepository $propertyRepository): Response
    {
        $properties = $propertyRepository->findAll();
        
        return $this->render('admin/property/index.html.twig', [
            'properties' => $properties
        ]);
    }

    /**
     * @route("/admin/property/create", name="admin.property.new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $property = new Property();
        $form = $this->createForm(PropertyType::class, $property)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->Persist($property);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success", "Le bien a été créé avec succès !");
            return $this->redirectToRoute("admin.property.index");
        }

        return $this->render('admin/property/new.html.twig', [
            'property' => $property,
            "form" => $form->createView()
        ]);   
    }

    /**
     * @route("/admin/edit/{id}", name="admin.property.edit")
     * @param Property $property
     * @param Request $request
     * @return Response
     */
    public function edit(Property $property, Request $request): Response
    {
        $form = $this->createForm(PropertyType::class, $property)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success", "Le bien a été modifié avec succès !");

            return $this->redirectToRoute("admin.property.index");
        }

        return $this->render('admin/property/edit.html.twig', [
            "form" => $form->createView()
        ]);   
    }

    /**
     * @Route("/admin/delete/{id}", name="admin.property.delete")
     * @param Property $property
     * @return RedirectResponse
     */
    public function delete(Property $property): RedirectResponse
    {

            $this->getDoctrine()->getManager()->remove($property);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success", "Le bien a été supprimé avec succès !");
        
        return $this->redirectToRoute("admin.property.index");
    }

}