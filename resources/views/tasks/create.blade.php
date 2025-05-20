<h1>Create Task</h1>
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="description" placeholder="Description"></textarea>
    <label><input type="checkbox" name="status"> Completed</label>
    <button type="submit">Save</button>
</form>
