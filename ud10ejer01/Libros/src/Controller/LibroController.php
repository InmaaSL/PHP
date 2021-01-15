<?php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


    class LibroController extends AbstractController
    {        
        /**
        * @Route("/libros", name="lista_libros")
        */
        private $libros = array(
            array("isbn" => "A001", "titulo" => "Jarry Choped", "autor" => "JK
            Bowling", "paginas" => 100),
            array("isbn" => "A002", "titulo" => "El señor de los palillos", "autor"
            => "JRR TolQuien", "paginas" => 200),
            array("isbn" => "A003", "titulo" => "Los polares de la tierra", "autor"
            => "Ken Follonett", "paginas" => 300),
            array("isbn" => "A004", "titulo" => "Los juegos de enjambre", "autor"
            => "Suzanne Collonins", "paginas" => 400)
            );

        public function libros()
        {
            $libros = NULL;
            foreach ($this->libros as $lib){
                $libros = $lib;
            }
            return $this->render('lista_libros.html.twig', array('libros' => $libros));
        }

        /**
        * @Route("/libro/{isbn}", name="ficha_libro")
        */
        public function ficha($isbn)
        {
            $libros = NULL;
            foreach ($this->libros as $lib){
                if ($lib["isbn"] == $isbn)
                $libros = $lib;
            }
            return $this->render('ficha_libro.html.twig', array('libros' => $libros));
        }

        

    }
?>