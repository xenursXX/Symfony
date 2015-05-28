<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use AppBundle\Entity\Questions;
use AppBundle\Form\QuestionsType;

/**
 * Questions controller.
 *
 * @Route("/questions")
 */
class QuestionsController extends Controller
{

    /**
     * Lists all Questions entities.
     *
     * @Route("/", name="questions")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $questions = $em->getRepository('AppBundle:Questions')->findAll();

        return $this->render('AppBundle:Questions:index.html.twig', [
            'questions' => $questions,
        ]);
    }
    /**
     * Creates a new Questions entity.
     *
     * @Route("/create", name="questions_create")
     * @Method("GET|POST")
     */
    public function createAction(Request $request)
    {
        $questions = new Questions();

        $form = $this->createForm(new QuestionsType(), $questions, array(
            'action' => $this->generateUrl('questions_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($questions);
            $em->flush();

            return $this->render('default/index.html.twig');
        }

        return $this->render('AppBundle:Questions:new.html.twig', [
            'questions' => $questions,
            'form'   => $form->createView(),
        ]);
    }


    /**
     * Finds and displays a Questions entity.
     *
     * @Route("/{id}", name="questions_show")
     * @Method("GET")
     */
    public function showAction(Questions $questions)
    {
        $deleteForm = $this->createDeleteForm($questions->getId());

        return $this->render('AppBundle:Questions:show.html.twig', [
            'questions'      => $questions,
            'delete_form' => $deleteForm->createView(),
        ]);
    }


    /**
     * Edits an existing Questions entity.
     *
     * @Route("/{id}/edit", name="questions_edit")
     * @Method("PUT|GET")
     * @Template("AppBundle:Questions:edit.html.twig")
     */
    public function updateAction(Request $request, Questions $questions)
    {
        $em = $this->getDoctrine()->getManager();

        $deleteForm = $this->createDeleteForm($questions->getId());

        $editForm = $this->createForm(new QuestionsType(), $questions, array(
            'action' => $this->generateUrl('questions_edit', array('id' => $questions->getId())),
            'method' => 'PUT',
        ));

        $editForm->add('submit', 'submit', array('label' => 'Update'));
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('questions'));
        }

        return $this->render('AppBundle:Questions:edit.html.twig', [
            'questions'      => $questions,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);





    }



    /**
     * Deletes a Questions entity.
     *
     * @Route("/{id}", name="Questions_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Questions')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Questions entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Questions'));
    }

    /**
     * Creates a form to delete a Questions entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Questions_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }
}
