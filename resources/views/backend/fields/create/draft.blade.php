<div class="form-group">
    <label for="draft">Draft</label>
    <input type="checkbox" name="draft" class="form-control {{ $errors->has('draft') ? 'is-invalid' : '' }}"
           id="draft" value="1"
           {{ old('draft') == 1 ? 'checked' : '' }}>
    @if ($errors->has('draft'))
        <span class="invalid-feedback">{{ $errors->first('draft') }}</span>
    @endif
</div>
