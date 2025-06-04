@extends('layouts.master')

@section('content')
<div class="container">
    <h4>Dependent Dropdown</h4>
    <form>
        <div class="mb-3">
            <label>State</label>
            <select id="state" class="form-select">
                <option value="">-- Select State --</option>
                @foreach($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>City</label>
            <select id="city" class="form-select">
                <option value="">-- Select City --</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Zip Code</label>
            <select id="zipcode" class="form-select">
                <option value="">-- Select Zip Code --</option>
            </select>
        </div>
    </form>
</div>



<script>
    $('#state').on('change', function () {
        let stateId = $(this).val();
        $('#city').html('<option value="">Loading...</option>');
        $('#zipcode').html('<option value="">-- Select Zip Code --</option>');

        if (stateId) {
            $.get('/get-cities/' + stateId, function (data) {
                let cityOptions = '<option value="">-- Select City --</option>';
                data.forEach(city => {
                    cityOptions += `<option value="${city.id}">${city.name}</option>`;
                });
                $('#city').html(cityOptions);
            });
        }
    });

    $('#city').on('change', function () {
        let cityId = $(this).val();
        $('#zipcode').html('<option value="">Loading...</option>');

        if (cityId) {
            $.get('/get-zipcodes/' + cityId, function (data) {
                let zipOptions = '<option value="">-- Select Zip Code --</option>';
                data.forEach(zip => {
                    zipOptions += `<option value="${zip.zip_code}">${zip.zip_code}</option>`;
                });
                $('#zipcode').html(zipOptions);
            });
        }
    });
</script>

@endsection