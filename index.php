<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Welcome to Code Challenge</title>
        
        <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
	<body>
        <div class="container">
            <div class="card my-3 display">
                <div class="card-body">
                    <h3 class="card-title">Welcome to Code Challenge</h3>
                    <p class="card-text">Please click Place below to place your packman somewhere.</p>
                </div>
            </div>
            <div class="card form">
                <div class="card-body">
                    <div class="form-group place">
                        <button class="btn btn-primary">PLACE</button>
                    </div>
                    <div class="form-group move">
                        <button class="btn btn-info" id="move">MOVE</button>
                        <button class="btn btn-info" id="left">LEFT</button>
                        <button class="btn btn-info" id="right">RIGHT</button>
                    </div>
                    <div class="form-group report">
                        <button class="btn btn-warning">REPORT</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function() { 
            $('.place .btn').on('click', function(e){
                $('.card.display .card-body').append('<p class="card-text">CLICK place BTN</p>');
            });

            $('.move .btn').on('click', function(e){
                $('.card.display .card-body').append('<p class="card-text">CLICK '+$(e.target).prop('id')+' BTN</p>');
            });

            $('.report .btn').on('click', function(e){
                $('.card.display .card-body').append('<p class="card-text">CLICK report BTN</p>');
            });
        });
    </script>
</html>