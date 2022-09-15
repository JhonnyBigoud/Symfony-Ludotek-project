<?php

namespace App\Controller;

use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/game', name: 'game_')]
class GameController extends AbstractController
{

    #[Route('', name: 'list')]
    public function list(GameRepository $gameRepository): Response
    {   
        // $games = $gameRepository->findBy([], ['name' => 'ASC']);
        // Tri par ordre alphabétique

        // $games = $gameRepository->count([]);
        // Décompte des jeux

        // $games = $gameRepository->count([
        //     'minimumAge' => 10 
        // ]);
        // Décompte des jeux min. 10 ans.

        $games = $gameRepository->findAll();
        // Liste de tous les jeux de la table

        // $games = $gameRepository->findBy([
        //     'minimumAge' => 10,
        //     'minimumPlayer' => 2,
        // ]);
        // Liste des jeux âge min = 10 et min player = 2

        // $games = $gameRepository->findBy(
        //     ['minimumAge' => 10,], 
        //     ['releaseAt' => 'DESC'], 2, 1
        //     );
        // DESC ou ASC permet de choisir l'odre, début ou fin. DESCendant ou ASCendant.

        // $games = $gameRepository->findOneBy([
        //     'minimumAge' => 10], ['releaseAt' => 'DESC']);

        // $game = $gameRepository->find(1);
        // dd($game);

        // dd($games);
        // dump($gameRepository);
        
        return $this->render('game/list.html.twig', [
            'games' => $games,
            // 'categories' => $categories,
        ]);
        // Le tableau passé en second paramètre correspond aux données qui sont rendus disponibles dans le template. En clé: le nom que ça aura sur le template et en valeur ce que nous voulons qui soit transmis sous ce nom au template.
    }

    #[Route('/{id}', name: 'single', requirements: ["id" => "\d+"])]
    public function single(GameRepository $gameRepository, $id): Response
    {
        $game = $gameRepository->find($id);
        // dd($game);
        return $this->render('game/single.html.twig', [
            'game' => $game,
        ]);
    }

    #[Route('/create', name: 'create')]
    public function form(): Response
    {
        return $this->render('game/form.html.twig');
    }
}
