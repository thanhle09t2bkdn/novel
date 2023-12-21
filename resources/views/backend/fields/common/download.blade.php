<div class="form-group">
    <form action="{{ $url }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="start_date" autocomplete="off"
                       class="form-control datepicker {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                       id="start-date" placeholder="Enter Start Date" value="{{ old('start_date') }}">
                @if ($errors->has('start_date'))
                    <span class="invalid-feedback">{{ $errors->first('start_date') }}</span>
                @endif
            </div>
            <div class="col-md-4">
                <input type="text" name="end_date" autocomplete="off"
                       class="form-control datepicker {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                       id="end-date" placeholder="Enter End Date" value="{{ old('end_date') }}">
                @if ($errors->has('end_date'))
                    <span class="invalid-feedback">{{ $errors->first('end_date') }}</span>
                @endif
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary mr-2 mb-2">
                    <i class="fas fa-download"></i> Download
                </button>
            </div>
        </div>
    </form>
</div>
