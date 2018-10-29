<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Welcome to Code Challenge</title>
        
        <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
        <!-- jQuery JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    </head>
	<body>
        <div class="container">
            <div class="card my-3">
                <div class="card-body">
                    <h3 class="card-title">Welcome to Code Challenge</h3>
                    <p class="card-text">Please click <strong>PLACE</strong> below to place your pacman somewhere.</p>
                </div>
            </div>
            <div class="card mb-3 form">
                <div class="card-body">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block place" id="place">PLACE</button>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <button class="btn btn-info btn-block move" id="move" disabled>MOVE</button>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <button class="btn btn-info btn-block move" id="left" disabled>LEFT</button>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <button class="btn btn-info btn-block move" id="right" disabled>RIGHT</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning btn-block report" id="report" disabled>REPORT</button>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger" role="alert" style="display: none;"></div>
            <div class="card my-3 display">
                <div class="card-body style-light"></div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function() { 
            $('.btn').on('click', function(event){
                execute(event);
            });
        });

        var fText = ['NORTH', 'EAST', 'SOUTH', 'WEST'];

        function execute(e){
            clearMessage();
            $.ajax({
                method: 'POST',
                url: 'pacman.php',
                dataType: 'json',
                data: {
                    command: $(e.target).prop('id')
                }
            }).done(function(data, textStatus, xhr) {
                var output = '';
                if(data.success){
                    switch(data.command){
                        case 'place':
                            $('.btn.place').prop('disabled', true);
                            $('.btn.move').prop('disabled', false);
                            $('.btn.report').prop('disabled', false);
                            $('.card.display .card-body p.card-text').remove();
                            output = 'PLACE '+data.location.x+','+data.location.y+','+fText[data.location.f];
                            break;
                        case 'move':
                            output = 'MOVE';
                            output = output;
                            break;
                        case 'left':
                            output = 'LEFT';
                            output = output;
                            break;
                        case 'right':
                            output = 'RIGHT';
                            output = output;
                            break;
                        case 'report':
                            $('.btn.place').prop('disabled', false);
                            $('.btn.move').prop('disabled', true);
                            $('.btn.report').prop('disabled', true);
                            output = 'RERPORT</p><p class="card-text">Output:'+data.location.x+','+data.location.y+','+fText[data.location.f];
                            break;
                    }
                    $('.card.display .card-body').append('<p class="card-text">'+output+'</p>');
                }else{
                    alertMessage('danger', data.message);
                }
            }).fail(function(xhr, textStatus, errorThrown) {
                alertMessage('danger', errorThrown);
            });

        }
        function clearMessage(){
            $('div.alert').hide().html('');
            $('div.alert').html('');
        }
        function alertMessage(type, message){
            $('div.alert').html(message).show();
        }
    </script>
</html>