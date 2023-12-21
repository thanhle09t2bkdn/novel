<div class="form-group">
    <label for="name-english">Name English</label>
    <input type="text" name="name_english" class="form-control {{ $errors->has('name_english') ? 'is-invalid' : '' }}"
           id="name-english" placeholder="Enter Name English" value="{{ old('name_english') }}">
    @if ($errors->has('name_english'))
        <span class="invalid-feedback">{{ $errors->first('name_english') }}</span>
    @endif
</div>
