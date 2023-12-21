<div class="form-group">
    <label for="role">Role</label>
    <select class="form-control select2 {{ $errors->has('role') ? 'is-invalid' : '' }}" name="role" id="role">
        @foreach($roles as $key => $value)
            <option value="{{ $key }}" {{ old('role', $item->role) == $key ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('role'))
        <span class="invalid-feedback">{{ $errors->first('role') }}</span>
    @endif
</div>
