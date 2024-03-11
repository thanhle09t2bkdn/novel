<div class="form-group">
    <label for="short-description">Short Description</label>
    <textarea name="short_description" class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}"
           id="short-description" placeholder="Enter Short Description" rows="4">{{ old('short_description') }}</textarea>
    @if ($errors->has('short_description'))
        <span class="invalid-feedback">{{ $errors->first('short_description') }}</span>
    @endif
</div>
