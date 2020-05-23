@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        新增 Todo
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('task.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">任務</label>
                                <div class="col-md-6">
                                    <label>
                                        <input name="name" type="text" class="form-control">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        新增
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        任務列表
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <th>&nbsp;</th>
                        <th class="w-50">Todo</th>
                        <th>選項</th>
                        <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            @include('task.list_item_task', ['task_name' => $task->name])
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
