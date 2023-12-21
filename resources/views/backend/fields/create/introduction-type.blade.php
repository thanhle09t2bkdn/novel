<div class="form-group">
    <label for="introduction-type-id">Introduction Type</label>
    <select class="form-control select2 {{ $errors->has('introduction_type_id') ? 'is-invalid' : '' }}" name="introduction_type_id" id="introduction-type-id">
        @foreach($introductionTypes as $introductionType)
            <option value="{{ $introductionType->id }}" {{ $introductionType->id == old('introduction_type_id') ? 'selected' : '' }}>
                {{ $introductionType->name }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('introduction_type_id'))
        <span class="invalid-feedback">{{ $errors->first('introduction_type_id') }}</span>
    @endif
</div>
