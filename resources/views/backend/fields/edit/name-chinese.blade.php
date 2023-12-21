<div class="form-group">
    <label for="name-chinese">Name Chinese</label>
    <input type="text" name="name_chinese" class="form-control {{ $errors->has('name_chinese') ? 'is-invalid' : '' }}"
           id="name-chinese" placeholder="Enter Name Chinese" value="{{ old('name_chinese', $item->name_chinese) }}">
    @if ($errors->has('name_chinese'))
        <span class="invalid-feedback">{{ $errors->first('name_chinese') }}</span>
    @endif
</div>
