<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
           id="name" placeholder="Enter Name" value="{{ old('name', $item->name) }}">
    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>
