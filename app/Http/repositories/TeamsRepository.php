<?php


namespace App\Http\repositories;


use App\Http\Models\Teams;
use Illuminate\Http\Request;

/**
 * Class TeamsRepository
 * @package App\Http\repositories
 */
class TeamsRepository
{
    /** @var Request */
    private $request;

    /**
     * TeamsRepository constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return Teams[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllTeams()
    {
        return Teams::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return Teams::find($id);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $teams = new Teams();
        $teams->name = $this->request->input('name');
        $teams->save();

        return redirect()->back();
    }

}