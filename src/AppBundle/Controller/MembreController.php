<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 06/10/2016
 * Time: 13:39
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Adresse;
use AppBundle\Entity\Membre;
use AppBundle\Form\MembreType;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class MembreController extends Controller
{
    /**
     * @Route("/membre/{idMembre}", name="membre_add", requirements={"idMembre":"add|\d+"})
     * @Template()
     */
    public function addAction(Request $request, $idMembre)
    {
        $em = $this->getDoctrine()->getManager();

        if ($idMembre == 'add'){
            $membre = new Membre();
        } else {
            $membre = $em->getRepository("AppBundle:Membre")->find($idMembre);
        }

        $originalTags = new ArrayCollection();
        foreach ($membre->getAdresse() as $adresse) {
            $originalTags->add($adresse);
        }
        
        $form = $this->createForm(MembreType::class, $membre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($originalTags as $adresse) {
                if ($membre->getAdresse()->contains($adresse) === false) {
                    $em->remove($adresse);
                }
            }
            if ($idMembre == 'add') {
                $em->persist($membre);
            }
            $em->flush();

            return $this->redirect($this->generateUrl('membre_add', array("idMembre" => $membre->getId())));
        }

        return array(
            'form' => $form->createView()
        );
    }
}