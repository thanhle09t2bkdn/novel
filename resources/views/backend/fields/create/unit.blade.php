<div class="form-group">
    <label for="unit">Unit</label>
    <input type="text" name="unit" class="form-control {{ $errors->has('unit') ? 'is-invalid' : '' }}"
           id="unit" placeholder="Enter Unit" value="{{ old('unit') }}">
    @if ($errors->has('unit'))
        <span class="invalid-feedback">{{ $errors->first('unit') }}</span>
    @endif
</div>
