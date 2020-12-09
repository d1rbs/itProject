<?php


namespace App\Http\Controllers;


use App\Http\services\GamesService;
use App\Http\services\TeamsService;

/**
 * Class GamesController
 * @package App\Http\Controllers
 */
class GamesController extends Controller
{
    /**
     * @var GamesService
     */
    private $gamesService;

    /**
     * @var TeamsService
     */
    private $teamsService;

    /**
     * GamesController constructor.
     * @param GamesService $gamesService
     */
    public function __construct(GamesService $gamesService, TeamsService $teamsService)
    {
        $this->middleware('auth');
        $this->gamesService = $gamesService;
        $this->teamsService = $teamsService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $teams = $this->teamsService->getAllTeams();

        return view('games.index', [
            'teams' => $teams,
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        $team = $this->teamsService->findTeamById($id);
        $analytics = $this->gamesService->analytics($id);

        return view('games.view', [
            'team' => $team,
            'analytics' => $analytics,
        ]);
    }
}