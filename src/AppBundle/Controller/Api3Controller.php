<?php

namespace AppBundle\Controller;

use AppBundle\Entity\QuestionsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class Api3Controller
 *
 * @package AppBundle\Controller
 *
 * @Route("/api")
 */
class Api3Controller extends Controller
{
    /**
     * @Route("/user/{id}", name="api_user", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function questionsAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** var UserRepository $repo */
        $repo = $em->getRepository('AppBundle:User');

        $user = $repo->findApi($id);

        // var_dump($quser);die;

        return new JsonResponse($user);
    }

   


}