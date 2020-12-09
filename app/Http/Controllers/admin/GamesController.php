<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\services\GamesService;
use App\Http\services\TeamsService;
use Illuminate\Http\Request;

/**
 * Class GamesController
 * @package App\Http\Controllers\admin
 */
class GamesController extends Controller
{
    /** @var Request */
    private $request;

    /** @var $gamesService */
    private $gamesService;

    /** @var $teamsService */
    private $teamsService;

    /**
     * GamesController constructor.
     * @param Request $request
     * @param GamesService $gamesService
     * @param TeamsService $teamsService
     */
    public function __construct(Request $request, GamesService $gamesService, TeamsService $teamsService)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->teamsService = $teamsService;
        $this->gamesService = $gamesService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // тут планується виводити усі матчі які ще проходять в даний час
        $objects = $this->gamesService->getAllGames();

        return view('admin.games.index', [
            'objects' => $objects,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create()
    {
        $teams = $this->teamsService->getAllTeams();

        if($this->request->isMethod('post')){
            $this->validate($this->request,[
                'k1' =>  'required',
                'k2' =>  'required',
                'g1' =>  'required|numeric',
                'g2' =>  'required|numeric',
                'done' =>  'required|boolean',
            ]);

        $this->gamesService->createGame();
        }

        return view('admin.games.create',[
            'teams' => $teams,
        ]);
    }

    public function store()
    {

        return view('admin.games.store');
    }

    public function edit()
    {

        return view('admin.games.edit');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id = null)
    {
        $this->gamesService->updateGamesByID($id);

        return view('admin.games.update');
    }

    public function destroy()
    {

        return view('admin.games.destroy');
    }

}