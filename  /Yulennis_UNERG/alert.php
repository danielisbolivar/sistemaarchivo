<?php if (isset($_GET["msj"])){ 
            $msj = $_GET["msj"];
              switch ($msj){
                case "exito":?>

                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Exito</strong> Registro Guardado.
                </div>
            
              
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>
            <?php break; 
                case "error": ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error</strong> No se Pudo Guardar el Registro.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>
            <?php break; 
                case "desabilitado": ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Desabilitado</strong> Cuenta de Usuario Desabilitada.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>
            <?php break; 
                case "activado": ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Exito</strong> Cuenta de Usuario Activada.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>
            <?php break; 
                case "listo": ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error</strong> Ya para esta Materia y Sección tomaste una Asistencia el Dia de hoy.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>
            <?php break; 
                case "actualizado": ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Usuario Actualizado</strong> Vuelva a Iniciar Sesión.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>

             <?php break; 
                case "asignado": ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Exito</strong> Profesor asignado correctamente.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>

            <?php break; 
                case "asignadoo": ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Exito</strong> Estudiante asignado correctamente.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>


            <?php break; 
                case "ocupado": ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Ocupado</strong> En este rango de Horas el Laboratorio se encuentra ya en uso.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>

            <?php break; 
                case "ney": ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error</strong> Ya el estudiante se encuentras asignado a esa Materia y Sección.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>

            <?php break; 
                case "cerrar": ?>
               <div class="alert alert-primary alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Exito</strong> Sesión Cerrada Correctamente.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>

            <?php break; 
                case "invalide": ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error</strong> Usuario ó Password Incorrecto.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>

            <?php break; 
                case "update": ?>
               <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Exito</strong> Registro Modificado.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>

              <?php break; 
                case "delete": ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Exito</strong> Registro Borrado.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>
            
                                <!--<?php break;
                                    //case "existe": ?>

                                <?php break; }?>

                            <?php } ?>
<!-Fin del mensaje-->


<?php if (isset($_GET["pagina"])){ 
            $pagina = $_GET["pagina"];
              switch ($pagina){
                case "1?update":?>

                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Exito</strong> Registro Actualizado.
                </div>
            
              
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>

              <?php break; 
                case "1?delete": ?>
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Exito</strong> Registro Borrado.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>

            <?php break; 
                case "1?coinciden": ?>
              <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error</strong> No se puede Modificar el Registro por los datos q estas colocando, coinciden con otros...
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>

            <?php break; 
                case "1?ocupado": ?>
              <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error</strong> Ya para este rango de horas, la Asistencia esta tomada para esa Persona...
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>

            <?php break; 
                case "1?exito": ?>
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Exito</strong> Registro Guardado.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>

            <?php break; 
                case "1?error": ?>
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error</strong> No se pudo Guardar el Registro.
                </div>
              <script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                  close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                  }
                }
            </script>
            
                                <!--<?php break;
                                    //case "existe": ?>
            
                                <!-<?php break;
                                    //case "existe": ?>


            
                                <!-<?php break;
                                    //case "existe": ?>

                                <?php break; }?>

                            <?php } ?>
<!-Fin del mensaje-->
