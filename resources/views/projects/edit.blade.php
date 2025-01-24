<form method="POST" action="/projects/{{ $project->id }}">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $project->title }}" required>
    <textarea name="description" required>{{ $project->description }}</textarea>
    <button type="submit">Update Project</button>
</form>
