<div class="form-group">
    <label for="custom-benchmark">Custom Benchmark</label>
    <input type="text" name="custom_benchmark" class="form-control {{ $errors->has('custom_benchmark') ? 'is-invalid' : '' }}"
           id="custom-benchmark" placeholder="Enter Custom Benchmark" value="{{ old('custom_benchmark', $item->custom_benchmark) }}">
    @if ($errors->has('custom_benchmark'))
        <span class="invalid-feedback">{{ $errors->first('custom_benchmark') }}</span>
    @endif
</div>
