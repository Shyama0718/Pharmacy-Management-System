<h1>Tasks</h1>
<a href="{{ route('tasks.create') }}">Create New Task</a>
<ul>
    @foreach($tasks as $task)
        <li>
            <strong>{{ $task->title }}</strong> - {{ $task->status ? 'Completed' : 'Active' }}
            <a href="{{ route('tasks.show', $task->id) }}">View</a>
        </li>
    @endforeach
</ul>
