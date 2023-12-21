<div class="form-group">
    <label for="image-file">Image</label>
    <div class="input-group">
        <input id="image-file" type="file" name="image_file" class="form-control-file {{ $errors->has('image_file') ? 'is-invalid' : '' }}">
        @if ($errors->has('image_file'))
            <span class="invalid-feedback">{{ $errors->first('image_file') }}</span>
        @endif
    </div>
</div>
