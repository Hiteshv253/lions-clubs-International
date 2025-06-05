<!DOCTYPE html>
<html>
<head>
    <title>Clubs List</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Clubs List</h2>
    <table>
        <thead>
            <tr>
                <th>Account Name</th>
                <th>Type</th>
                <th>District</th>
                <th>Region</th>
                <th>Lion ID</th>
                <th>Active Members</th>
                <th>Website</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clubs as $club)
                <tr>
                    <td>{{ $club->account_name }}</td>
                    <td>{{ $club->type }}</td>
                    <td>{{ $club->district }}</td>
                    <td>{{ $club->region_zone }}</td>
                    <td>{{ $club->lion_id }}</td>
                    <td>{{ $club->active_member_count }}</td>
                    <td>{{ $club->website }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
