<div class="form-group">
    <label for="data">Data</label>
    <textarea name="data" class="form-control {{ $errors->has('data') ? 'is-invalid' : '' }}"
           id="data" placeholder="Enter data" rows="4">{{ old('data') }}</textarea>
    @if ($errors->has('data'))
        <span class="invalid-feedback">{{ $errors->first('data') }}</span>
    @endif
</div>
