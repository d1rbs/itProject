<?php


namespace App\Http\repositories;


use App\Http\Models\Games;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class GamesRepository
 * @package App\Http\repositories
 */
class GamesRepository
{
    /** @var Request */
    private $request;

    /** @var DatabaseManager */
    private $databaseManager;

    /**
     * GamesRepository constructor.
     * @param Request $request
     */
    public function __construct(Request $request, DatabaseManager $databaseManager)
    {
        $this->request = $request;
        $this->databaseManager = $databaseManager;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createGame()
    {
        $games = new Games();

        $games->k1 = $this->request->input('k1');
        $games->k2 = $this->request->input('k2');
        $games->g1 = $this->request->input('g1');
        $games->g2 = $this->request->input('g2');
        $games->done = $this->request->input('done');
        $games->save();

        return redirect()->back();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function updateGame($id)
    {
        $game = Games::find($id);

        //ця частина ще в роботі!

      return $game;
    }

    /**
     * @return Games[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllGames()
    {
        return Games::all();
    }

    /**
     * @param $id
     * @return array
     */
    public function analytics($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        //для сирих запросів
       /* $k1 = $id;
        $k2 = $id;*/

        $analytics = [];

        /*кількість зіграних ігр:*/
        //$k_count = DB::select('select count(id) as count_id from games where k1 = :k1 or k2 = :k2 and done = 1 ', ['k1' => $k1, 'k2' => $k2]);
        $analytics['countGamesCommand'] = Games::where('k1', $id)->orWhere('k2', $id)->where('done', 1)->count('id');

        /*ігор виграно:*/
        //$k_win = DB::select('select count(id) as count_id from games where k1 = :k1 and g1 > g2 or k2 = :k2 and g2 > g1 and done = 1', ['k1' => $k1, 'k2' => $k2]);
        $analytics['winGamesCommand'] = Games::where('k1', $id)->whereRaw('g1 > g2')->orWhere('k2', $id)->whereRaw('g2 > g1')->where('done', 1)->count('id');

        /*ігор програно:*/
       // $k_lost = DB::select('select count(id) as count_id from games where k1 = :k1 and g1 < g2 or k2 = :k2 and g2 < g1 and done = 1 ', ['k1' => $k1, 'k2' => $k2]);
        $analytics['lostGamesCommand'] = Games::where('k1', $id)->whereRaw('g1 < g2')->orWhere('k2', $id)->whereRaw('g2 < g1')->where('done', 1)->count('id');

        /*ігор в нічию:*/
       // $k_draw = DB::select('select count(id) as count_id from games where k1 = :k1 or k2 = :k2 and g1 = g2 and done = 1 ', ['k1' => $k1, 'k2' => $k2]);
        $analytics['drawGamesCommand'] = Games::where('k1', $id)->orWhere('k2', $id)->whereRaw('g1 = g2')->where('done', 1)->count('id');

        /*кількість забитих голів (сирий запрос):*/
        /*$queryWithParentWin = DB::select('select sum(g1) from games
                                        where k1 = :k1 and done = 1', ['k1' => $k1]);*/
        /*$queryWithoutParentWin = DB::select('select sum(g2) from games
                                   where  k2 = :k2 and done = 1 ', ['k2' => $k2]);*/

        /*кількість забитих голів:*/
        $queryWithParentWin = Games::where('k1', $id)->where('done', 1)->sum('g1');
        $queryWithoutParentWin = Games::where('k2', $id)->where('done', 1)->sum('g2');
        $goalsScored = $queryWithParentWin+$queryWithoutParentWin;

        /*кількість пропущених голів:*/
        $queryWithParentLost = Games::where('k1', $id)->where('done', 1)->sum('g2');
        $queryWithoutParentLost = Games::where('k2', $id)->where('done', 1)->sum('g1');
        $goalsMissed = $queryWithParentLost+$queryWithoutParentLost;

        /*Коефіцієнт:*/
        $analytics['coefficient'] = $goalsScored / $goalsMissed;

        /*Кількість очків:*/
        $analytics['points'] = $analytics['winGamesCommand'] * 3 + $analytics['lostGamesCommand'] * 0 + $analytics['drawGamesCommand'];

        return $analytics;
    }
}