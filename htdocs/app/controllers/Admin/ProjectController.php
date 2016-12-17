<?php

class ProjectController extends BaseAdminController
{
    public function __construct() {
        parent::__construct();
        $this->beforeFilter('project_create', ['only' => 'store']);
        $this->beforeFilter('project_update', ['only' => 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::select(Project::column())
                        ->paginate(Project::PAGINATE);
        return View::make('admin.project.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = Input::all();
        if (Input::hasFile('image')) {
            $data['image'] = $this->imageUpload(Project::UPLOAD_KEY, Input::file('image'));
        } else $data['image'] = '';
        $data['content'] = $data['description'];
        if(Project::create($data)) {
          Session::flash('flash_success', trans('messages.create_success_projects'));
        }
        else {
          Session::flash('flash_error', trans('messages.create_fail_projects'));
        }
        return Redirect::route('admin.project.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Redirect::route('admin.project.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $column = Project::column();
        $column[] = 'content';
        $project = Project::select($column)->find($id);
        if($project) {
          return View::make('admin.project.edit')->with('project', $project);
        }
        else return View::make('errors.404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      $data = Input::all();
      $column = Project::column();
      $column[] = 'content';
      $project = Project::select($column)->find($id);
      if ($project) {
        if (Input::hasFile('image')) {
          $data['image'] = $this->imageUpload(Project::UPLOAD_KEY, Input::file('image'));
        } else $data['image'] = $project->image;
        if($project->update($data)) {
          Session::flash('flash_success', trans('messages.update_success_projects'));
        }
        else {
          Session::flash('flash_error', trans('messages.update_fail_projects'));
        }
        return Redirect::route('admin.project.edit', $id);
      } else return View::make('errors.404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function set_top($id) {
        return $this->set_attr_bool($id, 'top');
    }

    public function set_dur($id) {
        return $this->set_attr_bool($id, 'dur');
    }

    public function set_pro($id) {
        return $this->set_attr_bool($id, 'pro');
    }

    private function set_attr_bool($id, $attr) {
      $project = Project::select(['id', 'name', $attr])->find($id);
      if($project) {
        $envalue = 0;
        if($project->$attr == 0) $envalue = 1;
        $count = Project::count_attr($attr);
        if($envalue == 1 && $count >= 10) {
          Session::flash('flash_error', trans('messages.update_full_projects'));
        }
        else if($project->update([$attr => $envalue]))
          Session::flash('flash_success', trans('messages.update_success_projects'));
        else Session::flash('flash_error', trans('messages.update_fail_projects'));
        return Redirect::back();
      } else return View::make('errors.404');
    }
}
