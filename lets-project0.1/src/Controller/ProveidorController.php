<?php

namespace App\Controller;

use App\Entity\Proveidor;

use App\Form\ProveidorType;
use App\Repository\ProveidorRepository;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route; 

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProveidorController extends Controller
{
    /**
     * @Route("/", name="proveidor_index", methods={"GET"})
     */
    public function index(ProveidorRepository $ProveidorRepository): Response {
         // return new Response('<html><body>Hello<body><html>');    
         return $this->render('controller_proveidor/index.html.twig', [
            'proveidors' => $ProveidorRepository->findAll(),
        ]);
   } 

    /**
     * @Route("/proveidor/new", name="new_porveidor", methods={"GET","POST"})
     */
    public function new(Request $request)
    {
        $proveidor = new Proveidor();       

        $form = $this->createFormBuilder($proveidor)
            ->add('nom', TextType::class, array('attr' => array('class' => 'form-control') ))
            ->add('mail', TextType::class, array('attr' => array('class' => 'form-control') ))
            ->add('telefon', TextType::class, array('attr' => array('class' => 'form-control') ))
            ->add('actiu', CheckboxType::class, ['required' => false,] )
            ->add('tipus', ChoiceType::class, 
                [
                    'choices'  => [
                        'Hotel' => "Hotel",
                        'Pista' => "Pista",
                        'Complement' => "Complement"
                    ]
                ]) 
            ->add('data_alta', DateType::class, 
                    [
                        'widget' => 'single_text',
                        'format' => 'dd/MM/yyyy',
                        'input' => 'datetime',
                        'data' => new \DateTime('now'),
                        'attr' => ['readonly' => true],
                    ]
                )
            ->add('data_modificacio', DateType::class, 
                    [
                        'widget' => 'single_text',
                        'format' => 'dd/MM/yyyy',
                        'input' => 'datetime',
                        'data' => new \DateTime('now'),
                        'attr' => ['readonly' => true],
                    ]                    
                )
            ->add('save', SubmitType::class, array('label' => 'Creat', 'attr' => array('class' => 'btn btn-primary mt-3') ))
            ->getForm();

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $proveidor = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager -> persist($proveidor);
            $entityManager->flush();

            return $this->redirectToRoute('proveidor_index');
        }
        return $this->render('controller_proveidor/new.html.twig', array('form' => $form->createView() ));
    }

    /**
     * @Route("/{id}", name="proveidor_show", methods={"GET"})
     */
    public function show(Proveidor $proveidor): Response
    {
        return $this->render('controller_proveidor/show.html.twig', [
            'proveidor' => $proveidor,
        ]);
    }

     /**
     * @Route("/{id}/edit", name="proveidor_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, $id)
    {
        $proveidor = new Proveidor();
        $proveidor = $this->getDoctrine()->getRepository(Proveidor::class)->find($id);

        $form = $this->createFormBuilder($proveidor)
            ->add('nom', TextType::class, array('attr' => array('class' => 'form-control') ))
            ->add('mail', TextType::class, array('attr' => array('class' => 'form-control') ))
            ->add('telefon', TextType::class, array('attr' => array('class' => 'form-control') ))
            ->add('actiu', CheckboxType::class, ['required' => false,] )
            ->add('tipus', ChoiceType::class, 
                      
                        [
                            'choices'  => [
                                'Hotel' => "Hotel",
                                'Pista' => "Pista",
                                'Complement' => "Complement",
                            ]
                        ],
                    
                ) 
            ->add('data_modificacio', DateType::class, 
                    [
                        'widget' => 'single_text',
                        'format' => 'dd/MM/yyyy',
                        'input' => 'datetime',
                        'data' => new \DateTime('now'),
                        'attr' => ['readonly' => true],
                    ]                    
                )
            ->add('save', SubmitType::class, array('label' => 'Edit', 'attr' => array('class' => 'btn btn-primary mt-3')))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('proveidor_index');
        }
        return $this->render('controller_proveidor/edit.html.twig', array('form' => $form->createView() ));
    }

    /**
     * @Route("/{id}", name="proveidort_delete", methods={"POST"})
     */
    public function delete(Request $request, Proveidor $proveidor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$proveidor->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($proveidor);
            $entityManager->flush();
        }
 
        return $this->redirectToRoute('proveidor_index', [], Response::HTTP_SEE_OTHER);
    }

}