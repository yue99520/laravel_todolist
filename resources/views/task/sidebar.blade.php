<nav id="sidebar" class="card">
    <div id="sidebar-header" class="card-header">
        <h3>Menu</h3>
    </div>
    <div id="sidebar-body" class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="#">本週任務</a>
            </li>
            <li class="list-group-item">
                <a href="#">所有任務</a>
            </li>
            <li class="list-group-item">
                <a href="#">已完成任務</a>
            </li>
            <li class="list-group-item">
                <div class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">專案</a>
                    <ul class="collapse list-group list-group-flush" id="homeSubmenu">
{{--                        @foreach($projects as $project)--}}
                        <li class="list-group-item">
{{--                            <a href="#">{{ $project->name }}</a>--}}
                        </li>
{{--                        @endforeach--}}
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
