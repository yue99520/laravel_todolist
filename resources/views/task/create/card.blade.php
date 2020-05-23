<div class="card">
    <div class="card-header">
        新增 Todo
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('task.store') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">任務標題</label>
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
