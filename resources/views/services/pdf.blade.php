<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Service Report</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 5px; border: 1px solid #000; }
    </style>
</head>
<body>
    <h2>All Services</h2>
    <table>
        <thead>
            <tr>
                <th>#</th><th>Title</th><th>Sponsor</th><th>Start</th><th>End</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $i => $service)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $service->title }}</td>
                <td>{{ $service->sponsor }}</td>
                <td>{{ $service->start_date }}</td>
                <td>{{ $service->end_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
