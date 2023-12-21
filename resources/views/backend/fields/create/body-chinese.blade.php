<div class="form-group">
    <label for="body-chinese">Body Chinese</label>
    <textarea id="body-chinese" class="form-control {{ $errors->has('body_chinese') ? 'is-invalid' : '' }}" name="body_chinese" rows="5" placeholder="Enter Body Chinese">{{ old('body_chinese') }}</textarea>
    @if ($errors->has('body_chinese'))
        <span class="invalid-feedback">{{ $errors->first('body_chinese') }}</span>
    @endif
</div>
