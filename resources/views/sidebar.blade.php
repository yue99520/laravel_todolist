<nav id="sidebar" class="card">
    <div id="sidebar-header" class="card-header">
        <h3>Menu</h3>
    </div>
    <div id="sidebar-body" class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="{{ route('task.of_project', ['id' => auth()->user()->getDefaultProject()->id]) }}">收件夾</a>
            </li>
            <li class="list-group-item">
                <a href="#">本週任務</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('task.index') }}">所有任務</a>
            </li>
            <li class="list-group-item">
                <a href="#">已完成任務</a>
            </li>
            <li class="list-group-item">
                <div class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">專案</a>
                    <ul class="collapse list-group list-group-flush" id="homeSubmenu">
                        @php
                            use App\Project;
                            $projects = Project::query()->where('user_id', '=', auth()->id())->get();
                        @endphp
                        @foreach($projects as $project)
                            @if($project->default == false)
                            <li class="list-group-item">
                                <a href="{{ route('task.of_project', ['id' => $project->id]) }}">{{ $project->name }}</a>
                            </li>
                            @endif
                        @endforeach
{{--                        todo 改為javascript執行--}}
                    </ul>
                </div>
            </li>
            <li class="list-group-item">
                <a href="#">專案管理</a>
            </li>
        </ul>
    </div>
</nav>
