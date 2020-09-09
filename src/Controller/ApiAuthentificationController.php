<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ApiAuthentificationController extends AbstractController
{

    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("/api/inscription", name="inscription", method={"GET"})
     */
    public function index(Request $request)
    {

        $username = $request->query->get('username');
        $password = $request->query->get('pwd');

        // Verifions les types des données
        if (is_string($username) && is_string($password)) {

            // Ajout du nouvel utilisateur à la liste
            $utilisateurs[][] = ['id'=> random_int(1, 100), 'username' => $username, 'password' => $password];

            // Envoi de la liste des utilisateurs
            return new JsonResponse($utilisateurs);
        } else {

            // Les types ne sont pas bons 
            return new Response("<html><body> <div class='flash-error'> Les informations saisies ne sont pas valides. </div> </body></html>");
        }

    }

    /**
     * @Route("/api/authentification/{username}", name="authentification", method={"GET"})
     */
    public function connexion(Request $request, String $username)
    {

        // Dans le cas où rien n'est envoye en paramètre
        if (is_null($username))
            return new Response("<html><body> <div class='flash-error'> L'utilisateur n'existe pas. </div> </body></html>");
        else {
                // Tableau des utlisateurs
                $utilisateurs = [
                    [
                        'username' => 'Wilfried',
                        'password' => 'TheSeeker225',
                    ],
                    [
                        'username' => 'Carl',
                        'password' => 'Cool#225',
                    ]
                ];

                // Recuperation de l'utilisateur choisi
                $utilisateur = $utilisateurs[0][$username];

                if (!is_null($username)) {

                    // Envoi des informations de l'utilisateur
                    return new JsonResponse($utilisateur);
                } else {

                    // Message d'erreur
                    return new Response("<html><body> <div class='flash-warning'> L'utilisateur n'a pas été trouvé. </div> </body></html>");
                }

        };
    }

    /**
     * @Route("/api/deconnexion/{username}", name="deconnexion", method={"GET"})
     */
    public function deconnexion(Request $request, String $username)
    {
        // Dans le cas où rien n'est envoye en paramètre
        if (is_null($username))
        return new Response("<html><body> <div class='flash-error'> L'utilisateur ".$username." n'existe pas. </div> </body></html>");
        else {
                // Tableau des utlisateurs
                $utilisateurs = [
                    [
                        'username' => 'Wilfried',
                        'email' => 'wilfriedyoro68@gmail.com',
                    ],
                    [
                        'username' => 'Carl',
                        'email' => 'carl@network.ci',
                    ]
                ];

                // Recuperation de l'utilisateur choisi
                $utilisateur = $utilisateurs[0][$username];

                if (!is_null($username)) {

                    // Demande de deconnexion
                    #code

                    // Message de confirmation
                    return new Response("<html><body> <div class='flash-success'> L'utilisateur ".$username." est déconnecté. </div> </body></html>");
                } else {

                    return new Response("<html><body> <div class='flash-notice'> L'utilisateur ".$username." est déjà déconnecté. </div> </body></html>");
                    
                }

        };
    }
}
