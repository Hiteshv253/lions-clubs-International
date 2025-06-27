<script>

      $(document).ready(function () {
      // Pre-filled values
      const regionId = '{{ old("region_id", $member->region_id) }}';
      const zoneId = '{{ old("zone_id", $member->zone_id) }}';
      const clubId = '{{ old("club_id", $member->club_id) }}';
      const stateId = '{{ old("state_id", $member->state_id) }}';
      const cityId = '{{ old("city_id", $member->city_id) }}';
      const zipCode = '{{ old("zipcode", $member->zipcode) }}';

      // Load dependent dropdowns for region-zone-club
      if (regionId) {
            $.get("/get-zones/" + regionId, function (zones) {
                  $('#zone_id').empty().append('<option value="">Select Zone</option>');
                  $.each(zones, function (id, name) {
                        $('#zone_id').append(`<option value="${id}" ${id == zoneId ? 'selected' : ''}>${name}</option>`);
                  });
                  $('#zone_id').prop('disabled', false);

                  if (zoneId) {
                        $.get("/get-clubs/" + zoneId, function (clubs) {
                              $('#club_id').empty().append('<option value="">Select Club</option>');
                              $.each(clubs, function (id, name) {
                                    $('#club_id').append(`<option value="${id}" ${id == clubId ? 'selected' : ''}>${name}</option>`);
                              });
                              $('#club_id').prop('disabled', false);
                        });
                  }
            });
      }

      $('#region_id').on('change', function () {
            const id = $(this).val();
            $('#zone_id').html('<option>Loading...</option>').prop('disabled', true);
            $('#club_id').html('<option value="">Select Club</option>').prop('disabled', true);

            if (id) {
                  $.get("/get-zones/" + id, function (zones) {
                        $('#zone_id').empty().append('<option value="">Select Zone</option>');
                        $.each(zones, function (id, name) {
                              $('#zone_id').append(`<option value="${id}">${name}</option>`);
                        });
                        $('#zone_id').prop('disabled', false);
                  });
            }
      });

      $('#zone_id').on('change', function () {
            const id = $(this).val();
            $('#club_id').html('<option>Loading...</option>').prop('disabled', true);

            if (id) {
                  $.get("/get-clubs/" + id, function (clubs) {
                        $('#club_id').empty().append('<option value="">Select Club</option>');
                        $.each(clubs, function (id, name) {
                              $('#club_id').append(`<option value="${id}">${name}</option>`);
                        });
                        $('#club_id').prop('disabled', false);
                  });
            }
      });

      // Load state → city → zip
      if (stateId) {
            $.get("/get-cities/" + stateId, function (cities) {
                  $('#city_id').empty().append('<option value="">-- Select City --</option>');
                  $.each(cities, function (i, city) {
                        $('#city_id').append(`<option value="${city.id}" ${city.id == cityId ? 'selected' : ''}>${city.name}</option>`);
                  });

                  if (cityId) {
                        $.get("/get-zipcodes/" + cityId, function (zips) {
                              $('#zipcode').empty().append('<option value="">-- Select Zip Code --</option>');
                              zips.forEach(zip => {
                                    $('#zipcode').append(`<option value="${zip}" ${zip == zipCode ? 'selected' : ''}>${zip}</option>`);
                              });
                        });
                  }
            });
      }

      $('#state_id').on('change', function () {
            const id = $(this).val();
            $('#city_id').html('<option value="">Loading...</option>');
            $('#zipcode').html('<option value="">-- Select Zip Code --</option>');

            if (id) {
                  $.get('/get-cities/' + id, function (cities) {
                        let options = '<option value="">-- Select City --</option>';
                        $.each(cities, function (i, city) {
                              options += `<option value="${city.id}">${city.name}</option>`;
                        });
                        $('#city_id').html(options);
                  });
            }
      });

      $('#city_id').on('change', function () {
            const id = $(this).val();
            $('#zipcode').html('<option value="">Loading...</option>');

            if (id) {
                  $.get('/get-zipcodes/' + id, function (zips) {
                        let options = '<option value="">-- Select Zip Code --</option>';
                        zips.forEach(zip => {
                              options += `<option value="${zip}">${zip}</option>`;
                        });
                        $('#zipcode').html(options);
                  });
            }
      });
});

</script>