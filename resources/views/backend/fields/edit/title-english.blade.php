<div class="form-group">
    <label for="title-english">Title English</label>
    <input type="text" name="title_english" class="form-control {{ $errors->has('title_english') ? 'is-invalid' : '' }}"
           id="title-english" placeholder="Enter Title English" value="{{ old('title_english', $item->title_english) }}">
    @if ($errors->has('title_english'))
        <span class="invalid-feedback">{{ $errors->first('title_english') }}</span>
    @endif
</div>
