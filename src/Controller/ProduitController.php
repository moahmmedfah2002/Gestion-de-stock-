<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProduitController extends AbstractController
{
   #[Route('/TableauProduit')]
    public function  index(Request $request,ProduitRepository $produitRepository): Response
    {if ($request->getSession(false)->get("login")==true) {


        $produits = $produitRepository->findAll();

        return $this->render("Tableau_prod/index.html.twig", ['produits' => $produits, "role" => $request->getSession(false)->get("role"),"page"=>"tableP"]);
    }
    else{
        return $this->redirect("/");
    }
    }

    #[Route('/FormProd')]
    public function  form(Request $request): Response
    {



        return $this->render("Form_prod/index.html.twig",["page"=>"formP","role"=>$request->getSession()->get("role")]);
    }

}