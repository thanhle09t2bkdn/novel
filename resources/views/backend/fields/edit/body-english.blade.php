<div class="form-group">
    <label for="body-english">Body English</label>
    <textarea id="body-english" class="form-control {{ $errors->has('body_english') ? 'is-invalid' : '' }}" name="body_english" rows="5" placeholder="Enter Body English">{{ old('body_english', $item->body_english) }}</textarea>
    @if ($errors->has('body_english'))
        <span class="invalid-feedback">{{ $errors->first('body_english') }}</span>
    @endif
</div>
