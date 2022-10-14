<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <style>
        html{
            /*background-color:blue;*/
            text-align:center;
            font-size:38px;
        }
        h3{
            color:red;
            font-size:30px;
        }
        h2{
            color:aqua;
            font-size:25px;
        }
        body{
            
	        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	        background-size: 400% 400%;
	        animation: gradient 15s ease infinite;
	        height: 100vh;
        }

            @keyframes gradient {
	        0% {
		    background-position: 0% 50%;
	    }
	        50% {
		    background-position: 100% 50%;
	    }
	        100% {
		    background-position: 0% 50%;
	    }
    }
        
    input{    
            width: 400px;
            height: 25px;  
            margin-top: 80px;
            font-family: Lato;
            font-size: 25px;    
            background-color: transparent;
            border: none;
            border-top: 3px solid #4EA5D9;    
            border-bottom: 3px solid #4EA5D9;
            outline: none;
            color: #4EA5D9;
            padding-left: 10px;  
    }
        button{
            align-items: center;
            background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
            border: 0;
            border-radius: 8px;
            box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
            box-sizing: border-box;
            color: #FFFFFF;
            display: relative;
            font-family: Phantomsans, sans-serif;
            font-size: 20px;
            justify-content: center;
            line-height: 1em;
            max-width: 100%;
            min-width: 140px;
            padding: 3px;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            cursor: pointer;
    }


        
    </style>
    <title>todo list</title>
</head>
<body class="bg-info" >
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>Plan your day by adding this to do today</h3>
                <form action="{{route('store')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="add your task">
                        <button type="submit" class="btn btn-dark btn-sm px-4">add tasks</button>
                    </div>

                </form>
                <h2>Things you are supposed to accomplish</h2>
                @if (count($todolists))
                <ul>
                    @foreach($todolists as $todolist)
                    <li class="list-group list-group-flush mt-3">
                        <form action="{{route('destroy',$todolist->id)}}" method="POST">
                            {{$todolist->content}}

                        @csrf
                        @method('delete')
                        <button type="submit" class=" btn btn-link btn-sm float-end">delete</button>
                        </form>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>

    
</body>
</html>