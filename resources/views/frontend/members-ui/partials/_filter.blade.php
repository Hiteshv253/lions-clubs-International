<form id="filterForm" class="row align-items-end g-2">
      <div class="col-md-3">
            <input type="text" class="form-control" name="search" placeholder="Search by Name or Mobile">
      </div>
      <div class="col-md-2">
            <select class="form-select" name="region_id">
                  <option value="">All Regions</option>
                  @foreach($regions as $region)
                  <option value="{{ $region->id }}">{{ $region->name }}</option>
                  @endforeach
            </select>
      </div>
      <div class="col-md-2">
            <select class="form-select" name="zone_id">
                  <option value="">All Zones</option>
                  @foreach($zones as $zone)
                  <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                  @endforeach
            </select>
      </div>
      <div class="col-md-2">
            <select class="form-select" name="club_id">
                  <option value="">All Clubs</option>
                  @foreach($clubs as $club)
                  <option value="{{ $club->id }}">{{ $club->name }}</option>
                  @endforeach
            </select>
      </div>
      <div class="col-md-3 text-end">
            <button type="submit" class="btn btn-primary me-2">Filter</button>
            <button type="button" id="resetBtn" class="btn btn-secondary">Reset</button>
      </div>
</form>
