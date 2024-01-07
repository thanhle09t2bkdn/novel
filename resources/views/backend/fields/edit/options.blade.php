<div class="form-group">
    <h4>Options</h3>
    @for($i = 0; $i <= 3; $i++)
        <input type="text" name="options[{{ $i }}][name]" class="form-control {{ $errors->has('options'. $i . '.name') ? 'is-invalid' : '' }}"
               id="options.{{ $i }}.name" placeholder="Enter Answer" value="{{ old('options.'. $i . '.name', $item->options[$i]->name) }}">
        @if ($errors->has('options.'. $i . '.name'))
            <span class="invalid-feedback">{{ $errors->first('options.'. $i . '.name') }}</span>
        @endif
        <div class="form-check">
            <input type="radio" name="options[{{ $i }}][is_answer]" value="1"  {{ old('options.'. $i . '.is_answer', $item->options[$i]->is_answer) == 1 ? 'checked' : '' }} class="form-check-input" id="options.{{ $i }}.is_answer">
            <label class="form-check-label" for="options.{{ $i }}.is_answer">Select answer</label>
            @if ($errors->has('options.'. $i . '.is_answer'))
                <span class="invalid-feedback">{{ $errors->first('options.'. $i . '.is_answer') }}</span>
            @endif
        </div>
    @endfor

</div>
