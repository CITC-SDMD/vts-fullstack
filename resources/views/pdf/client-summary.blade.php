<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .table-container {
            margin: 0 auto;
            max-width: 800px;
            width: 100%;
        }

        .custom-table {
            border-collapse: collapse;
            width: 100%;
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .custom-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .custom-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <div>
        <div style="text-align: center; padding-top: 3rem; padding-bottom: 3rem;">
            <p style="font-size: medium; font-weight: 500; margin: 0px;">
                Republic of the Philippines
            </p>
            <p style="font-size: large; font-weight: 700;  margin: 0px;">
                OFFICE OF THE CITY MAYOR
            </p>
            <p style="font-size: medium; font-weight: 500; margin: 0px;">
                City of Davao
            </p>
            <p style="font-size: large; font-weight: 700; margin: 0px;">
                INTEGRATED GENDER AND DEVELOPMENT DIVISION
            </p>
            <p style="font-size: large; font-weight: 700; margin-top: 4rem; margin-bottom: 0px;">
                For the period of {{ $duration }}
            </p>
            <p style="font-size: large; font-weight: 700; margin: 0px;">Summary of Number of Clients Assisted by
                CMO-IGDD</p>
        </div>
        <div class="table-container">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th rowspan="2">Quarter</th>
                        <th colspan="2">No. of Clients</th>
                        <th rowspan="2">Total</th>
                    </tr>
                    <tr>
                        <th>Women</th>
                        <th>Children</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalWomen = 0;
                        $totalChildren = 0;
                    @endphp
                    @foreach ($summaries as $summary)
                        <tr>
                            <td>{{ $summary->quarter }}</td>
                            <td>{{ $summary->women }}</td>
                            <td>{{ $summary->children }}</td>
                            <td>{{ $summary->children + $summary->women }}</td>
                        </tr>
                        @php
                            $totalWomen += $summary->women;
                            $totalChildren += $summary->children;
                        @endphp
                    @endforeach
                    <tr>
                        <td>Total</td>
                        <td>{{ $totalWomen }}</td>
                        <td>{{ $totalChildren }}</td>
                        <td>{{ $totalWomen + $totalChildren }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
