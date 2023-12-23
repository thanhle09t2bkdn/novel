<div class="form-group">
    <label for="content-editor">Content</label>
    <textarea id="content-editor" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" rows="5" placeholder="Enter Content">{{ old('content', $item->content) }}</textarea>
    @if ($errors->has('content'))
        <span class="invalid-feedback">{{ $errors->first('content') }}</span>
    @endif
</div>
