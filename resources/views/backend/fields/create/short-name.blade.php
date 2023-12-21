<div class="form-group">
    <label for="short-name">Short Name</label>
    <input type="text" name="short_name" class="form-control {{ $errors->has('short-name') ? 'is-invalid' : '' }}"
           id="short-name" placeholder="Enter Short Name" value="{{ old('short_name') }}">
    @if ($errors->has('short_name'))
        <span class="invalid-feedback">{{ $errors->first('short_name') }}</span>
    @endif
</div>
