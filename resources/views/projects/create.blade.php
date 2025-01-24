<form method="POST" action="/projects">
    @csrf
    <input type="text" name="title" required>
    <textarea name="description" required></textarea>
    <button type="submit">Create Project</button>
</form>
