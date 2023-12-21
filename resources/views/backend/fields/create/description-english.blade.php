<div class="form-group">
    <label for="description-english">Description English</label>
    <textarea name="description_english" class="form-control {{ $errors->has('description_english') ? 'is-invalid' : '' }}"
              id="description-english" placeholder="Enter Description English" rows="4">{{ old('description_english') }}</textarea>
    @if ($errors->has('description_english'))
        <span class="invalid-feedback">{{ $errors->first('description_english') }}</span>
    @endif
</div>
