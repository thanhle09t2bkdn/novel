<div class="form-group">
    <label for="type">Type</label>
    <select class="form-control select-two {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="stock-status">
        @foreach($typeNames as $key => $typeName)
            <option value="{{ $key }}" {{ old('ward', $item->type) === $key ? 'selected' : '' }}>
                {{ $typeName }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('type'))
        <span class="invalid-feedback">{{ $errors->first('type') }}</span>
    @endif
</div>
