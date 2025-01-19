@props(['action', 'parentId' => null])

<form action="{{ $action }}" method="POST">
    @csrf
    @if ($parentId)
        <input type="hidden" name="parent_id" value="{{ $parentId }}">
    @endif
    <div class="mb-3">
        <label for="comment" class="form-label">{{ $parentId ? 'Reply' : 'Comment' }}</label>
        <textarea class="form-control" id="comment" name="content" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Post</button>
</form>
