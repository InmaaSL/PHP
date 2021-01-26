<?php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    
    use App\Entity\Libro;
    
    
    class LibroController extends AbstractController
    {        
        
        private $libros = array(
            array("isbn" => "A001", "titulo" => "Jarry Choped", "autor" => "JK Bowling", "paginas" => 100),
            array("isbn" => "A002", "titulo" => "El señor de los palillos", "autor" => "JRR TolQuien", "paginas" => 200),
            array("isbn" => "A003", "titulo" => "Los polares de la tierra", "autor" => "Ken Follonett", "paginas" => 300),
            array("isbn" => "A004", "titulo" => "Los juegos de enjambre", "autor" => "Suzanne Collonins", "paginas" => 400)
        );
        
        /**
         * @Route("/libros/insertar", name="insertar_libro")
         */
        public function insertar(){
            $libros = NULL;
            foreach ($this->libros as $lib) {
                $nuevo_libro = new Libro();
                $nuevo_libro->setIsbn($lib["isbn"]); 
                $nuevo_libro->setTitulo($lib["titulo"]);
                $nuevo_libro->setAutor($lib["autor"]);               
                $nuevo_libro->setPaginas($lib["paginas"]);
        
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($nuevo_libro);
                $entityManager->persist($nuevo_libro);
                
                try
                {
                    $entityManager->flush();
                }
                catch (\Exception $e)
                {
                    return new Response("Error insertando el libro");
                }
            }
            return $this->redirectToRoute('lista_libros');
        }

        /**
        * @Route("/libros", name="lista_libros")
        */
        public function lista()
        {
            $repositorio = $this->getDoctrine()->getRepository(Libro::class);
            $libros = $repositorio->findAll();

            return $this->render('lista_libros.html.twig', array('libros' => $libros));
            
        }

        /**
        * @Route("/libros/{isbn}", name="ficha_libro")
        */
        public function ficha($isbn)
        {
            $repositorio = $this->getDoctrine()->getRepository(Libro::class);
            $libros = $repositorio->find($isbn);

            return $this->render('ficha_libro.html.twig', array('libros' => $libros));
            
            // $libros = NULL;
            // foreach ($this->libros as $lib){
            //     if ($lib["isbn"] == $isbn)
            //     $libros = $lib;
            // }
        }

        /**
        * @Route("/eliminar/{isbn}", name="eliminar_libro")
        */
        public function eliminar_libro($isbn)
        {
            $entityManager = $this->getDoctrine()->getManager();
            $repositorio = $this->getDoctrine()->getRepository(Libro::class);
            $libro = $repositorio->find($isbn);
            if ($libro)
            {
                $entityManager->remove($libro);
                $entityManager->flush();
            }

            return $this->redirectToRoute('lista_libros');

        }

        /**
        * @Route("/libros/paginas/{paginas}", name="lista_libros_paginas")
        */
        public function filtrarPaginas($paginas){
            $repositorio = $this->getDoctrine()->getRepository(Libro::class);
            $resultado = $repositorio->nPaginas($paginas);

            return $this->render('lista_libros_paginas.html.twig', array('libros' => $resultado));
        }


    }
?>