<div class="form-group">
    <label for="package">Package</label>
    <input package="text" name="package" class="form-control {{ $errors->has('package') ? 'is-invalid' : '' }}"
           id="package" placeholder="Enter Package" value="{{ old('package', $item->package) }}">
    @if ($errors->has('package'))
        <span class="invalid-feedback">{{ $errors->first('package') }}</span>
    @endif
</div>
