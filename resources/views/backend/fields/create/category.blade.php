<div class="form-group">
    <label for="category-id">Category</label>
    <select class="form-control select2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id" id="category-id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('category_id'))
        <span class="invalid-feedback">{{ $errors->first('category_id') }}</span>
    @endif
</div>
