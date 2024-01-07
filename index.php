
<!doctype html>

<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <title>@LucasGomes0101</title>
  
</head>

<body>



               
                  
		
            
				 <center>

<br>

<br>
<h1>LucasGomes - Checker 
				   </h1>
                   <STRONG></STRONG><br>
                
<br>
<br>

<hr>


       <textarea id="lista" placeholder="EX: Email | Senha | Cpf | Senha" style="width: 800px;height: 200px;resize: none;background-color: transparent;border: 2px solid dark;color: silver; "></textarea>

<br>
      <font color="black">Status: <span id="status" class="badge badge-warning ">Esperando..</span>   Aprovadas: <span   id="cLive" class="badge badge-success ">0</span>  Reprovadas: <span  id="cDie" class="badge badge-danger ">0</span>  Testadas: <span  id="total" class="badge badge-info ">0</span>  Total: <span  id="carregadas" class="badge badge-dark " >0</span></font>
<br>
<br>
<button class="btn btn-outline-info" style="width: 150px; outline: none;"id="testar" onclick="enviar()">INICIAR</button>
<button class="btn btn-outline-info" style="width: 150px; outline: none;"id="testar" id="parar">PARAR</button>
  
<hr>

<script title="ajax do checker">
    function enviar() {
		var audio = new Audio('live.mp3');
        var linha = $("#lista").val();
        var linhaenviar = linha.split("\n");
        var total = linhaenviar.length;
        var ap = 0;
        var rp = 0;
	

	
        linhaenviar.forEach(function(value, index) {
            setTimeout(
                function() {
                    $.ajax({
                        url: 'api.php?string=' + value,
                        type: 'GET',
                        async: true,
                        success: function(resultado) {
                            if (resultado.match("#APROVADA")) {
                                removelinha();
                                ap++;
								audio.play();
							
                                aprovadas(resultado + "");
                            }else {
                                removelinha();
                                rp++;
                                reprovadas(resultado + "");
								
								
                            }
                            $('#carregadas').html(total);
                            var fila = parseInt(ap) + parseInt(rp);
                            $('#cLive').html(ap);
                            $('#cDie').html(rp);
                            $('#total').html(fila);
							         $('#status').html("Iniciado.");
									   
									   
									 
									 if (fila == total) {
             
                                    document.getElementById("status").innerHTML = "Finalizado.";
                                }
                        }
                    });

                }, 600 * index);
        });
    }
    function aprovadas(str) {
        $(".aprovadas").append(str + "<br>");
    }
    function reprovadas(str) {
        $(".reprovadas").append(str + "<br>");
    }
    function removelinha() {
        var lines = $("#lista").val().split('\n');
        lines.splice(0, 1);
        $("#lista").val(lines.join("\n"));
    }
</script>
 <center>

   <span class="btn btn-success" style="width: 45%">APROVADAS</span>
           <div id=".aprovadas" class="aprovadas"></div>
           <span class="btn btn-danger" style="width: 45%;margin-top: 40px">REPROVADAS</span>
           <div id=".reprovadas" class="reprovadas"></div>
</center>

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


   



</body>

</html>
