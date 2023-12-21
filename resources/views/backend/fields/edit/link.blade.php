<div class="form-group">
    <label for="link">Link</label>
    <input type="text" name="link" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}"
           id="link" placeholder="Enter Link" value="{{ old('link', $item->link) }}">
    @if ($errors->has('link'))
        <span class="invalid-feedback">{{ $errors->first('link') }}</span>
    @endif
</div>
