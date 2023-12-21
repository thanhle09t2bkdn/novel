<div class="form-group">
    <label for="title-chinese">Title Chinese</label>
    <input type="text" name="title_chinese" class="form-control {{ $errors->has('title_chinese') ? 'is-invalid' : '' }}"
           id="title-chinese" placeholder="Enter Title Chinese" value="{{ old('title_chinese') }}">
    @if ($errors->has('title_chinese'))
        <span class="invalid-feedback">{{ $errors->first('title_chinese') }}</span>
    @endif
</div>
