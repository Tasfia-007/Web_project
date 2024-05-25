<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Details</title>
    <style>
        /* Base styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7fafc;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background-color: #edf2f7;
            color: #718096;
            text-transform: uppercase;
            font-size: 12px;
        }

        td {
            background-color: #fff;
            color: #4a5568;
            font-size: 14px;
        }

        /* Buttons styles */
        .btn {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #4a90e2;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #357bd8;
        }

        .btn-danger {
            background-color: #e53e3e;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c53030;
        }

        /* Responsive styles */
        @media only screen and (max-width: 768px) {
            th,
            td {
                font-size: 12px;
            }
        }

        @media only screen and (max-width: 576px) {
            th,
            td {
                font-size: 10px;
            }
        }
    </style>
</head>
<x-guest-layout>
<body>
    <div class="container">
        <div class="flex justify-end m-2 p-2">
            <!-- <a href="{{ route('admin.reservations.create') }}" class="btn btn-primary">New Reservation</a> -->
            <a href="{{ route('reservations.step.one') }}" class="btn btn-primary">New Reservation</a> <span>  </span> 
            <!-- <a href="{{ route('user.reservations.cancel') }}" class="btn btn-primary">Cancel Reservation</a> -->
            <a href="{{  route('cancellations.create') }}" class="btn btn-primary">Cancel Reservation</a> <span>  </span>
        </div>
        
        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Reservation ID</th>
                        <th>Table</th>
                        <th>Guests</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->first_name }} {{ $reservation->last_name }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->res_date }}</td>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->table->name }}</td>
                            <td>{{ $reservation->guest_number }}</td>
                            <!-- <td>
                                <div class="flex space-x-2">
                                    <a href="{{ route('user.reservations.edit', $reservation->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form method="POST"
                                        action="{{ route('user.reservations.destroy', $reservation->id) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
    </x-guest-layout>
</html>
