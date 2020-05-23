<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Project;
use App\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of all tasks.
     *
     * @return Response
     */
    public function index()
    {
        $userId = auth()->id();
        $tasks = Task::query()->where('user_id', "=", $userId)->get();
        $tasks = $this->excludeDone($tasks);
        return response()->view('task/index', ['tasks' => $tasks, 'title' => '全部']);
    }

    /**
     *
     * Display a listing of tasks in the project
     * @param $id
     * @return Response
     */
    public function tasksOfProject($id)
    {
        $userId = auth()->id();
        $project = Project::query()->where('user_id', '=', $userId)->findOrFail($id);
        $tasks = $project->tasks;
        $tasks = $this->excludeDone($tasks);
        return response()->view('task/index', ['tasks' => $tasks, 'title' => $project->name]);
    }

    private function excludeDone(Collection $tasks)
    {
        return $tasks->filter(function ($task) {
            return $task->done_at == null;
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskStoreRequest $request
     * @return RedirectResponse
     */
    public function store(TaskStoreRequest $request)
    {
        $validatedData = $request->validated();
        $task = new Task();
        $task->name = $validatedData['name'];
        $task->user_id = auth()->id();

        $project = auth()->user()->getDefaultProject();
        $task->project_id = $project->id;

        $task->save();

        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function show($id)
    {
        return redirect()->route('task.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $task = Task::query()->where("user_id", "=", auth()->id())->findOrFail($id);

        return response()->view('task/edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(TaskUpdateRequest $request, $id)
    {
        $name = $request->validated()["name"];
        $task = Task::query()->where("user_id", "=", auth()->id())->findOrFail($id);

        $task->name = $name;
        $task->user_id = auth()->id();
        $task->save();

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $task = Task::query()->where("user_id", "=", auth()->id())->findOrFail($id);

        $task->delete();

        return redirect()->route('task.index');
    }

    public function done(Request $request, $id)
    {
        $task = Task::query()->where("user_id", "=", auth()->id())->findOrFail($id);
        $task->done_at = now();
        $task->save();

        return redirect()->route('task.index');
    }
}
