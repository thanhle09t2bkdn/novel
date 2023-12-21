<div class="form-group">
    <label for="sub-title-english">Sub Title English</label>
    <input type="text" name="sub_title_english" class="form-control {{ $errors->has('sub_title_english') ? 'is-invalid' : '' }}"
           id="sub-title-english" placeholder="Enter Sub Title English" value="{{ old('sub_title_english', $item->sub_title_english) }}">
    @if ($errors->has('sub_title_english'))
        <span class="invalid-feedback">{{ $errors->first('sub_title_english') }}</span>
    @endif
</div>
