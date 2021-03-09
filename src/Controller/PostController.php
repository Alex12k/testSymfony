<?php


namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;




class PostController
{
    private Environment $twig;
    private EntityManagerInterface $em;
    private FormFactoryInterface $formFactory;

    public function __construct(
        Environment $twig,
        EntityManagerInterface $em,
        FormFactoryInterface $formFactory
    )
    {
        $this->twig = $twig;
        $this->em = $em;
        $this->formFactory = $formFactory;
    }


    /**
     * @Route("/blog/", name="app_blog_controller")
     */
    public function index(Request $request)
    {

        $repository = $this->em->getRepository(Post::class);
        $data       = $repository->fetchAll();

        $content = $this->twig->render("post.html.twig", ['data' => $data]);
        return new Response($content);
    }


    /**
     * @Route("/blog/{id}", name="app_post_edit")
     */
    public function edit(Request $request)
    {
        $repository = $this->em->getRepository(Post::class);
        $data       = $repository->find($request->attributes->get('id'));
        if($data === null){
             throw new NotFoundHttpException('error post not found');
        }

        $form = $this->formFactory->create(PostForm::class, $data);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $this->em->persist($data);
            $this->em->flush();
            return new RedirectResponse('/blog/');

        }

        $content = $this->twig->render("post_edit.html.twig", ['form' => $form->createView()]);
        return new Response($content);
    }


}