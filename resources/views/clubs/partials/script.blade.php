<script>
      $('#district').on('change', function () {
            let districtId = $(this).val();
            $('#region').html('<option value="">Select Region</option>');
            $('#zone').html('<option value="">Select Zone</option>');
            if (districtId) {
                  $.get('/regions-by-district/' + districtId, function (regions) {
                        $.each(regions, function (key, region) {
                              $('#region').append(`<option value="${region.id}">${region.name}</option>`);
                        });
                  });
            }
      });

      $('#region').on('change', function () {
            let regionId = $(this).val();
            $('#zone').html('<option value="">Select Zone</option>');
            if (regionId) {
                  $.get('/zones-by-region/' + regionId, function (zones) {
                        $.each(zones, function (key, zone) {
                              $('#zone').append(`<option value="${zone.id}">${zone.name}</option>`);
                        });
                  });
            }
      });
</script>
