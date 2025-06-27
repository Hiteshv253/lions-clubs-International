<script>
$(document).ready(function () {
    // Region → Zone
    $('#region_id').on('change', function () {
        let regionId = $(this).val();
        $('#zone_id').html('<option value="">Loading...</option>').prop('disabled', true);
        $('#club_id').html('<option value="">Select Club</option>').prop('disabled', true);

        if (regionId) {
            $.get(`/get-zones/${regionId}`, function (data) {
                $('#zone_id').empty().append('<option value="">Select Zone</option>');
                $.each(data, function (id, name) {
      $('#zone_id').append(`<option value="${id}">${name}</option>`);
                });
                $('#zone_id').prop('disabled', false);
            });
        }
    });

    // Zone → Club
    $('#zone_id').on('change', function () {
        let zoneId = $(this).val();
        $('#club_id').html('<option value="">Loading...</option>').prop('disabled', true);

        if (zoneId) {
            $.get(`/get-clubs/${zoneId}`, function (data) {
                $('#club_id').empty().append('<option value="">Select Club</option>');
                $.each(data, function (id, name) {
      $('#club_id').append(`<option value="${id}">${name}</option>`);
                });
                $('#club_id').prop('disabled', false);
            });
        }
    });

    // State → City
    $('#state_id').on('change', function () {
        let stateId = $(this).val();
        $('#city_id').html('<option value="">Loading...</option>');
        $('#zipcode').html('<option value="">-- Select Zip Code --</option>');

        if (stateId) {
            $.get(`/get-cities/${stateId}`, function (data) {
                let options = '<option value="">-- Select City --</option>';
                data.forEach(city => {
      options += `<option value="${city.id}">${city.name}</option>`;
                });
                $('#city_id').html(options);
            });
        }
    });

    // City → Zipcode
    $('#city_id').on('change', function () {
        let cityId = $(this).val();
        $('#zipcode').html('<option value="">Loading...</option>');

        if (cityId) {
            $.get(`/get-zipcodes/${cityId}`, function (data) {
                let options = '<option value="">-- Select Zip Code --</option>';
                data.forEach(zip => {
      options += `<option value="${zip}">${zip}</option>`;
                });
                $('#zipcode').html(options);
            });
        }
    });
});
</script>