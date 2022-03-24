<style>
    * {
        margin: 0%;
        padding: 0%;
    }
    .content {
        padding: 7px;
        margin: 2px;
    }
    .header {
        font-family: sans-serif;
        margin-top: 0.9em;
        margin-bottom: 2.5px
    }

    .styled-table {
        border-collapse: collapse;
        margin: 5px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 100px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }

    .styled-table th,
    .styled-table td {
        padding: 6px 6px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

</style>

<div class="content">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2 class="header">AKSCP Community Members</h2>
            </div>
        </div>
    </div>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Position</th>
                <th>State</th>
                <th>LGA</th>
                <th>Services</th>
                <th>Ward</th>
                <th>Unit</th>
                <th>Disability</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $users)
                <tr>
                    <td>{{ $users->ofFullName() }}</td>
                    <td>{{ $users->phone_number }}</td>
                    <td>{{ $users->email }}</td>
                    <td>{{ $users->gender }}</td>
                    <td>{{ $users->position }}</td>
                    <td>{{ $users->state }}</td>
                    <td>{{ $users->village }}</td>
                    <td>{{ $users->services }}</td>
                    <td>{{ $users->ward }}</td>
                    <td>{{ $users->unit }}</td>
                    <td>{{ $users->disability }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
