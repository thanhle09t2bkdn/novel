<div class="form-group">
    <label for="content-chinese">Content Chinese</label>
    <textarea id="content-chinese" class="form-control {{ $errors->has('content_chinese') ? 'is-invalid' : '' }}" name="content_chinese" rows="5" placeholder="Enter Content Chinese">{{ old('content_chinese', $item->content_chinese) }}</textarea>
    @if ($errors->has('content_chinese'))
        <span class="invalid-feedback">{{ $errors->first('content_chinese') }}</span>
    @endif
</div>
