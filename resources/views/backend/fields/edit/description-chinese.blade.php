<div class="form-group">
    <label for="description-chinese">Description Chinese</label>
    <textarea type="text" name="description_chinese" class="form-control {{ $errors->has('description_chinese') ? 'is-invalid' : '' }}"
           id="description-chinese" placeholder="Enter Description Chinese" rows="4">{{ old('description_chinese', $item->description_chinese) }}</textarea>
    @if ($errors->has('description_chinese'))
        <span class="invalid-feedback">{{ $errors->first('description_chinese') }}</span>
    @endif
</div>
