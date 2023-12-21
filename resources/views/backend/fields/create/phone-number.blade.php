<div class="form-group">
    <label for="phone-number">Phone Number</label>
    <input type="text" name="phone_number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
           id="phone-number" placeholder="Enter Phone Number" value="{{ old('phone_number') }}">
    @if ($errors->has('phone_number'))
        <span class="invalid-feedback">{{ $errors->first('phone_number') }}</span>
    @endif
</div>
