<div class="form-group">
    <label for="post-id">Post</label>
    <select class="form-control select2 {{ $errors->has('post_id') ? 'is-invalid' : '' }}" name="post_id" id="post-id">
        @foreach($posts as $post)
            <option value="{{ $post->id }}" {{ $post->id == old('post_id') ? 'selected' : '' }}>
                {{ $post->name }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('post_id'))
        <span class="invalid-feedback">{{ $errors->first('post_id') }}</span>
    @endif
</div>
