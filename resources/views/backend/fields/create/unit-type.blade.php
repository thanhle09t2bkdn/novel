<div class="form-group">
    <label for="unit-type">Unit Type</label>
    <select class="form-control select2 {{ $errors->has('unit_type') ? 'is-invalid' : '' }}" name="unit_type" id="unit-type">
        @foreach($unitTypeNames as $key => $value)
            <option value="{{ $key }}" {{ $key == old('unit_type') ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('unit_type'))
        <span class="invalid-feedback">{{ $errors->first('unit_type') }}</span>
    @endif
</div>
