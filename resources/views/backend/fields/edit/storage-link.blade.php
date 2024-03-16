<div class="form-group">
    <label for="storage-link">Storage Link</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <button type="button" data-input="storage-link" data-preview="preview-image-storage-link" class="btn btn-primary image-manager">
                <i class="far fa-image"></i> Choose
            </button>
        </div>
        <input id="storage-link" type="text" name="storage_link" class="form-control {{ $errors->has('storage_link') ? 'is-invalid' : '' }}" placeholder="https://" value="{{ old('storage_link', $item->storage_link) }}">
        @if ($errors->has('storage_link'))
            <span class="invalid-feedback">{{ $errors->first('storage_link') }}</span>
        @endif
    </div>
    <p id="preview-image-storage-link" class="my-3">
        @if (old('storage_link', $item->storage_link))
            <img src="{{ old('storage_link', $item->storage_link) }}" style="height: 5rem;">
        @endif
    </p>
</div>
