<div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
           id="address" placeholder="Enter Address" value="{{ old('address', $item->address) }}">
    @if ($errors->has('address'))
        <span class="invalid-feedback">{{ $errors->first('address') }}</span>
    @endif
</div>
