<div class="form-group">
    <label for="sub-title-chinese">Sub Title Chinese</label>
    <input type="text" name="sub_title_chinese" class="form-control {{ $errors->has('sub_title_chinese') ? 'is-invalid' : '' }}"
           id="sub-title-chinese" placeholder="Enter Sub Title Chinese" value="{{ old('sub_title_chinese', $item->sub_title_chinese) }}">
    @if ($errors->has('sub_title_chinese'))
        <span class="invalid-feedback">{{ $errors->first('sub_title_chinese') }}</span>
    @endif
</div>
