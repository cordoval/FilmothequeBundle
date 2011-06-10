<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cordoval
 * Date: 6/9/11
 * Time: 2:29 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Cordova\FilmothequeBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Cordova\FilmothequeBundle\Entity\Actor;
use Cordova\FilmothequeBundle\Form\ActorForm;

class ActorController extends ContainerAware
{
    public function listAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $actors = $em->getRepository('CordovaFilmothequeBundle:Actor')->findAll();

        return $this->container->get('templating')->renderResponse(
            'CordovaFilmothequeBundle:Actor:list.html.twig',
            array(
                'actors' => $actors
            ));
    }

    public function editAction($id = null)
    {
        $message = '';

        $em = $this->container->get('doctrine')->getEntityManager();

        if(isset($id))
        {
            // change if an actor exists
            $actor = $em->find('CordovaFilmothequeBundle:Actor', $id);

            if(!$actor)
            {
                $message = 'No actor found';
            }
        }
        else
        {
            // adding a new actor
            $actor = new Actor();
        }

        $form = $this->container->get('form.factory')->create(new ActorForm());
        $form->setData($actor);

        $request = $this->container->get('request');

        if($request->getMethod() == 'POST')
        {
            $form->BindRequest($request);

            if($form->isValid())
            {
                $em->persist($actor);
                $em->flush();
                if(isset($id))
                {
                    $message = 'Actor modified successfully!';
                }
                else
                {
                    $message = 'Actor added successfully!';
                }
            }
        }

        return $this->container->get('templating')->renderResponse(
            'CordovaFilmothequeBundle:Actor:add.html.twig',
            array(
                'form' => $form->createView(),
                'message' => $message,
            )
        );
    }

    public function deleteAction($id)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $actor = $em->find('CordovaFilmothequeBundle:Actor', $id);

        if(!$actor)
        {
            throw new NotFoundHttpException("Actor not found");
        }

        $em->remove($actor);
        $em->flush();

        return new RedirectResponse($this->container->get('router')->generate('cordova_actor_list'));
    }
}
