<?php


namespace App\Http\services;


use App\Http\repositories\GamesRepository;

/**
 * Class GamesService
 * @package App\Http\services
 */
class GamesService
{
    /**
     * @var GamesRepository
     */
    private $gamesRepository;

    /**
     * GamesService constructor.
     * @param GamesRepository $gamesRepository
     */
    public function __construct(GamesRepository $gamesRepository)
    {
        $this->gamesRepository = $gamesRepository;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createGame()
    {
       return $this->gamesRepository->createGame();
    }

    /**
     * @return GamesRepository
     */
    public function updateGamesByID($id)
    {
        return $this->gamesRepository->updateGame($id);
    }

    /**
     * @return \App\Http\Models\Games[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllGames()
    {
        return $this->gamesRepository->getAllGames();
    }

    /**
     * @param $id
     * @return array
     */
    public function analytics($id)
    {
        return $this->gamesRepository->analytics($id);
    }
}