<div class="form-group">
    <label for="unit_type">Unit Type</label>
    <select class="form-control select-two {{ $errors->has('unit_type') ? 'is-invalid' : '' }}" name="unit_type" id="stock-status">
        @foreach($unitTypeNames as $key => $value)
            <option value="{{ $key }}" {{ old('ward', $item->unit_type) === $key ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('unit_type'))
        <span class="invalid-feedback">{{ $errors->first('unit_type') }}</span>
    @endif
</div>
