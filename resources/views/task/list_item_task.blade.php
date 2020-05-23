<tr>
    <td>
        <form method="post" action="{{ route('task.done', $task->id) }}">
            @csrf
            <button class="btn btn-success"
                    type="submit"
                    name="complete"
                    value="1">
                完成
            </button>
        </form>
    </td>
    <td class="table-text">
        {{ $task_name }}
    </td>
    <td>
        <form method="post" action="{{ route('task.destroy', $task->id) }}">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger">
                刪除
            </button>
        </form>
    </td>
    <td>
        <a href="{{ route('task.edit', $task->id) }}">
            <button class='btn btn-warning'>
                編輯
            </button>
        </a>
    </td>
</tr>
