<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('dashboard') }}" style="position: fixed; right: 20px; z-index: 1000;">
        Go to Dashboard
    </a>

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
                @foreach ($products as $product)
                    
                
                <tr>
                    <td>{{$product->order->users->name}}</td>

                   
                    <td>{{$product->order->users->email}} </td>
                   
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
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