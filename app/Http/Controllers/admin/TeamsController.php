<?php


namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\services\TeamsService;
use Illuminate\Http\Request;

/**
 * Class TeamsController
 * @package App\Http\Controllers\admin
 */
class TeamsController extends Controller
{

    /** @var Request */
    private $request;

    /** @var $teamsService */
    private $teamsService;

    /**
     * TeamsController constructor.
     * @param Request $request
     * @param TeamsService $teamsService
     */
    public function __construct(Request $request, TeamsService $teamsService)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->teamsService = $teamsService;
    }

    public function index()
    {

        return view('admin.teams.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create()
    {
        if($this->request->isMethod('post')){
            $this->validate($this->request,[
               'name' =>  'required|min:3|max:25'
            ],[
                'name.required' => 'Потрібно обовязково ввести дані в це поле',
                'name.min' => 'мінімум 3 букви!',
                'name.max' => 'максимум 25 букв!',
            ]);

        $this->teamsService->create();
        }

        return view('admin.teams.create');
    }

    public function store()
    {

        return view('admin.teams.store');
    }

    public function edit()
    {

        return view('admin.teams.edit');
    }

    public function update()
    {

        return view('admin.teams.update');
    }

    public function destroy()
    {

        return view('admin.teams.destroy');
    }
}