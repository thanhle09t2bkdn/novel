<div class="form-group">
    <label for="order">Order</label>
    <input type="number" min="1" name="order" class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}"
           id="order" placeholder="Enter order" value="{{ old('order', $item->order) }}">
    @if ($errors->has('order'))
        <span class="invalid-feedback">{{ $errors->first('order') }}</span>
    @endif
</div>
