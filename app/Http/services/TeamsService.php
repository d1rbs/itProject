<?php

namespace App\Http\services;


use App\Http\repositories\TeamsRepository;

/**
 * Class TeamsService
 * @package App\Http\services
 */
class TeamsService
{
    /** @var TeamsRepository */
    private $teamsRepository;

    /**
     * TeamsService constructor.
     * @param TeamsRepository $teamsRepository
     */
    public function __construct(TeamsRepository $teamsRepository)
    {
        $this->teamsRepository = $teamsRepository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findTeamById($id)
    {
       return $this->teamsRepository->findById($id);
    }

    /**
     * @return \App\Http\Models\Teams[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllTeams()
    {
       return $this->teamsRepository->getAllTeams();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        return $this->teamsRepository->create();
    }

}