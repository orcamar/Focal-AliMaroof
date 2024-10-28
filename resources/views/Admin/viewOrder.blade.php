<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Orders</title>
    <style>

        /* Global Styles */
        body {
                   font-family: Arial, sans-serif;
                   margin: 0;
                   padding: 0;
                   background-color: #121212;
                   color: #ffffff;
               }
               a {
                   text-decoration: none;
                   color: inherit;
               }
         /* Table Styles */
         table {
                   width: 100%;
                   border-collapse: collapse;
                   margin-top: 20px;
                   background-color: #1f1f1f;
                   color: #ffffff;
               }
       
               table th, table td {
                   padding: 12px;
                   text-align: left;
                   border-bottom: 1px solid #333;
               }
       
               table th {
                   background-color: #333;
               }
       
               table tr:hover {
                   background-color: #444;
               }
       
               .operations button {
                   background-color: #66ccff;
                   border: none;
                   color: #000;
                   padding: 5px 10px;
                   cursor: pointer;
               }
       
               .operations button:hover {
                   background-color: #3399ff;
               }
       
               /* Restore buttons */
               .restore-btn {
                   background-color: #66ccff;
                   border: none;
                   color: #000;
                   padding: 10px 15px;
                   cursor: pointer;
                   margin-bottom: 20px;
               }
       
               .restore-btn:hover {
                   background-color: #3399ff;
               }
       
       
           </style>
</head>
<body>
    <a href="{{ route('dashboard') }}" style="position: fixed; right: 20px; z-index: 1000;">
        Go to Dashboard
    </a>


    <select name="" id="">
        <option value="">select product</option>
        @foreach($products as $product)
        <option > <a href="{{route('orders.search',$product->id)}}">{{$product->name}}</a></option>
        @endforeach
    </select>
    <!-- Content -->
    <div class="content">
        <h2>Orders List</h2>

        <!-- order Table --> 

        <table>
            <thead>
                <tr>
                    <th>Custumer Name</th>
                    <th>Custumer Email</th>
                    <th>Prodect Name</th>
                    <th>Product Price</th>
                    <th>Operations</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    
                
                <tr>
                    <td>{{$order->users->name}}</td>

                   
                    <td>{{$order->users->email}} </td>
                   
                    <td>{{$order->products->name}}</td>
                    <td>{{$order->products->price}}</td>
                    <td class="operations">
        
                            <form action="{{route('orders.destroy',$order)}}" method="POST">
                                @csrf
                                @method('DELETE')
    
    
                                <button type="submit"> Delete</button>
                                
                            </form> 
  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

</body>
</html>