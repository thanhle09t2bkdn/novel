<div class="form-group">
    <label for="content-english">Content English</label>
    <textarea id="content-english" class="form-control {{ $errors->has('content_english') ? 'is-invalid' : '' }}" name="content_english" rows="5" placeholder="Enter Content English">{{ old('content_english') }}</textarea>
    @if ($errors->has('content_english'))
        <span class="invalid-feedback">{{ $errors->first('content_english') }}</span>
    @endif
</div>
