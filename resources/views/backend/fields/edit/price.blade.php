<div class="form-group">
    <label for="price">Price</label>
    <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
           id="price" placeholder="Enter Price" value="{{ old('price', $item->price) }}">
    @if ($errors->has('price'))
        <span class="invalid-feedback">{{ $errors->first('price') }}</span>
    @endif
</div>
