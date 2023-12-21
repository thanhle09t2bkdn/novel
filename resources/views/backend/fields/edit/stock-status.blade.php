<div class="form-group">
    <label for="stock_status">Stock Status</label>
    <select class="form-control select-two {{ $errors->has('stock_status') ? 'is-invalid' : '' }}" name="stock_status" id="stock-status">
        @foreach($stockNames as $key => $value)
            <option value="{{ $key }}" {{ old('ward', $item->stock_status) === $key ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('stock_status'))
        <span class="invalid-feedback">{{ $errors->first('stock_status') }}</span>
    @endif
</div>
