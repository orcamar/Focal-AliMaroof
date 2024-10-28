<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Document</title>
</head>
<body>
    <a href="{{ route('dashboard') }}" style="position: fixed; right: 20px; z-index: 1000;">
        Go to Dashboard
    </a>
     <!-- Content -->
     <div class="content">
        <h2>Trashed Product List</h2>

        <!-- Product Table -->
        
        
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Operations</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    
                
                <tr>
                    <td>{{$product->name}}</td>

                   
                    <td>
                        
                        <ul>
                            @foreach ($product->categories as $category)
                            <li>
                                {{$category->name}}
                            </li>
                            @endforeach
                        </ul>
                        
                        

                    </td>
                   
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td class="operations">
                        
                            
                             <form action="{{route('products.restore',$product->id)}}" method="POST">
                                @csrf
                                @method('PUT')
    
    
                                <button type="submit">Restore</button>
                                
                            </form> 
                            <a href="{{route('products.forceDelete',$product->id)}}">Force Delete</a>
                            
                       
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
</body>
</html>