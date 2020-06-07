<!DOCTYPE html>
<html>
    <head>
        <title>Banner</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
  <body>
        <div class="cuerpo">
            <div class="banner">
                <div class="titulo">Mi banner</div>
            </div>
            <div class="contenido">
                <div class="menu">
                    <div onclick="texto('inicio')"> <a class="selected">Inicio</a> </div>
                    <div onclick="texto('mision')"> <a class="selected">Misión</a></div>
                    <div onclick="texto('vision')"> <a class="selected">Visión</a></div>
                    <div onclick="texto('objetivo')"> <a class="selected">Objetivo</a></div>
                    <div onclick="texto('valores')"> <a class="selected">Valores</a></div>
                    <div onclick="texto('mapa')"> <a class="selected">Mapa</a></div>
                </div>
                <div id="texto" class="texto">
                    <p> Benemérita Univesidad Autónoma de Puebla</p>
                </div>
            </div>
            <div class="pie">
                <div class="pie-i">PDT 2017 - 2021</div>
                <div class="pie-d">Benemerita Univeridad Autonoma de Puebla</div>
            </div>
        </div>
        <script>
            function texto(dato){

                if (dato==='inicio') {
                    document.getElementById("texto").innerHTML='<p style=" text-align: center; font-size: 25px; color: #309fe8;">Bienvenido a la pagina de inico<br></p><img src="images/buap.png" width="525px" height="275px" style="margin-left: 275px;">';
                }else if (dato==='mision') {
                    document.getElementById("texto").innerHTML="La misión del Programa de Regionalización Universitaria es hacer de la BUAP una institución educativa comprometida con el desarrollo de la sociedad, que considera a la educación como un bien público y que busca llevar los beneficios de la educación, extensión universitaria, difusión de la cultura e investigación a las distintas regiones del estado, ampliando la cobertura educativa de calidad, propiciando la integración social y fomentando la equidad en el acceso a la educación privilegiando a los grupos sociales en situación de desventaja.";
                }else if(dato==='vision'){
                    document.getElementById("texto").innerHTML="Nuestra visión de mediano y largo plazos es ver a la BUAP como una institución educativa comprometida e integrada a las distintas regiones del Estado, con una oferta académica versátil, en un ambiente educativo incluyente, promoviendo en los estudiantes un espíritu crítico y responsable de su aprendizaje, generando conocimientos que impulsen el desarrollo regional a través de programas académicos pertinentes y de calidad, de los que egresen ciudadanos integrales con espíritu de liderazgo, con profunda vocación y compromiso social. ";
                }else if(dato==='objetivo'){
                    document.getElementById("texto").innerHTML="Fortalecer el desarrollo con equidad y calidad de las Unidades Regionales a través de la actualización de su infraestructura física y tecnológica, la apertura de programas educativos pertinentes en los niveles de licenciatura y posgrado, el impuso a la investigación regional, la formación y actualización de los docentes, y la vinculación con los sectores productivos y gubernamentales de cada región.";
                }else if(dato==='valores'){
                    document.getElementById("texto").innerHTML="Valores <br>• Ética<br>• Solidaridad<br>• Responsabilidad<br>• Honestidad<br>• Respeto<br>• Equidad<br>• Tolerancia<br>• Transparencia<br>• Identidad<br>•";
                }else if(dato==='mapa'){
                    document.getElementById("texto").innerHTML='<img src="images/mapa.png" width="700px" height="310px" style="align-items: center; margin-left: 132px;"> ';
                }
            }
        </script>
  </body>
</html>
