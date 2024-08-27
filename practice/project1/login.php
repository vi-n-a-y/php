<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

   <style>
           .container1 {
            margin-top: 18%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* / margin: 0 auto; / */


        }
        form{
            border:1px solid black;
            padding:20px 40px;
            background-color: white;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to bottom, #959a85, #959a85);
        }

        .button-gap {
            margin-top: 20px;
        }
        button{
            padding:5px 30px;
            color:white;
            font-weight: bold;
            background-color:orange;
            border: none;
        }
        label{
            color:blue;
        }
        h2{
            text-align: center;
            color:orange;
        }

        input{
            padding:5px 20px;
        }

       

        table {
            border-collapse: separate;
            border-spacing: 0 10px; 
        }

        td {
            padding: 5px; 
        }
   </style>
</head>
<body>
    <div class="container1">

        <form action="login.php" method="post">
            <h2>Login</h2>
            <table>
                
                    <tr>
                        <td>
                            <label for="email">Email</label>
                        </td>
                        <td> <input type="email" name="email" id="email" placeholder="Enter your Email">

                        </td>
                    </tr>
                
                <tr>
                    <td>
                        <label for="password">password</label>
                    </td>
                    <td><input type="password" name="Password" id="Password" placeholder="Enter your password">

                    </td>
                </tr>
            </table>
            <div class="button-gap">
                <button>Submit</button>
            </div>


        </form>
    </div>
</body>
</html>