<div class="card">
    <div class="card-header">
        {{ $title }} - 任務列表
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>&nbsp;</th>
            <th class="w-50">Title</th>
            <th>選項</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            @include('task.show.item', ['task_name' => $task->name])
        @endforeach
        </tbody>
    </table>
</div>
