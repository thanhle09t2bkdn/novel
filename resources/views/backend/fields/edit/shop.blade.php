<div class="form-group">
    <label for="category-id">Shop</label>
    <select class="form-control select2 {{ $errors->has('shop_id') ? 'is-invalid' : '' }}" name="shop_id" id="shop-id">
        <option value="" {{ old('shop_id', $item->shop_id) == '' ? 'selected' : '' }}>
        </option>
        @foreach($shops as $shop)
            <option value="{{ $shop->id }}" {{ old('shop_id', $item->shop_id) == $shop->id ? 'selected' : '' }}>
                {{ $shop->name }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('shop_id'))
        <span class="invalid-feedback">{{ $errors->first('shop_id') }}</span>
    @endif
</div>
