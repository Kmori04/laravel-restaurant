<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Hello World!</h1>

    <p>This is a test paragraph to test if everything is working.</p>

    <table>
        <tr>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Options</th>
        </tr>


        @foreach($customerData as $custData)
            <tr>
                <td>{{ $custData->cust_ID }}</td>
                <td>{{ $custData->cust_name }}</td>
                <td>{{ $custData->cust_address }}</td>
                <td class= "form-options">
                    <form action="{{ route('customerEdit',$custData->cust_ID) }}" method="POST">
                        @csrf 
                        @method('GET')

                        <input type="submit" value="Edit">

                    </form>

                    <form action="{{ route('customerDelete', $custData ->cust_ID) }}" method="POST">
                        @csrf
                        @method('DELETE');
                        <input type= "submit" value="Delete">



                    </form>
                </td>
            </tr>
        @endforeach
    </table>
        <br>
        <h1 class="customer-header">Customer Registration Form</h1>

        <form class="customer-form" action="{{route('saveCustomer')}}" method="POST">

        @csrf

            <label>Customer Name</label>
            <br>
            <input type= "text" id="custName" name="custName">

            <br>
            <label>Customer Address</label>
            <br>
            <input type= "text" id="custAdd" name="custAdd">

            <br><br>

            <input type= "submit" value="Submit">
       </form>

     
</body>
</html>