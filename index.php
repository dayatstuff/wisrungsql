<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wis rung SQL-e</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        
            

            
            .container {
                display: grid ;
                grid-column-gap: 5px;
                grid-template-columns: auto auto;
                grid-template-rows: auto auto ;
            }
            
        

            .full {
                padding: 10px;
                grid-column: 1/3 ;
                grid-rows: 2/3;
            }

            .wrap {
                height: 30px; 
                width:100%;
            }
            
            .input {
                width: 70%; 
                text-align: center;
            }
            


    </style>
</head>
<body>
    <form action="main.php" method="post">
        <div class="container">
            <div class="setengah">
                <h4> MySQL Server 1 </h4>
                <div class="wrap">
                    <span>Host</span>
                    <input required="required" type="text" name="host1" id="host1" class="input" >
                </div>
                <div class="wrap">
                    <label >port</label>
                    <input required="required" type="text" name="port1" id="port1" placeholder="3306" value="3306" class="input" >
                </div>
                <div class="wrap">
                    <label >Username</label>
                    <input required="required" type="text" name="user1" id="user1" class="input">
                </div>
                <div class="wrap">
                    <label >Password</label>
                    <input required="required" type="password" name="pass1" id="pass1" placeholder="" class="input" >
                </div>
                <div class="wrap">
                    <label >Database Name</label>
                    <input required="required" type="text" name="db1" id="db1" class="input" >
                </div>

            </div>

            <div class="setengah">
                <h4> MySQL Server 2 </h4>
                <div class="wrap">
                    <label >Host</label>
                    <input required="required" type="text" name="host2" id="host2" class="input" >
                </div>
                <div class="wrap">
                    <label >PORT</label>
                    <input required="required" type="text" name="port2" id="port2" placeholder="3306" value="3306" class="input" >
                </div>
                <div class="wrap">
                    <label >Username</label>
                    <input required="required" type="text" name="user2" id="user2" class="input" >
                </div>
                <div class="wrap">
                    <label >Password</label>
                    <input required="required" type="password" name="pass2" id="pass2" placeholder="" class="input" >
                </div>
                <div class="wrap">
                    <label >Database Name</label>
                    <input required="required" type="text" name="db2" id="db2" class="input" >
                </div>

            </div>

            <div class="full">
                <button type="submit" style="width: 100% ; text-align: center; height: 40px; text-weight:bolder;" id="cek"> Periksa perbedaan </button>
            </div>

            
        </div>


    </form>
    
    

</body>

</html>