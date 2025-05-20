<h1>Edit Task</h1>
<form method="POST" action="{{ route('tasks.update', $task->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $task->title }}" required>
    <textarea name="description">{{ $task->description }}</textarea>
    <label><input type="checkbox" name="status" {{ $task->status ? 'checked' : '' }}> Completed</label>
    <button type="submit">Update</button>
</form>
