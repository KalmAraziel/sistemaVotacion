<style>

.embed-responsive {
    position: relative;
    display: block;
    height: 0;
    padding: 0;
    overflow: hidden
}

.embed-responsive .embed-responsive-item,.embed-responsive iframe,.embed-responsive embed,.embed-responsive object,.embed-responsive video {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    height: 100%;
    width: 100%;
    border: 0
}

.embed-responsive-16by9 {
    padding-bottom: 56.25%
}

.embed-responsive-4by3 {
    padding-bottom: 75%
}

</style>

<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1><i class="fa fa-pie-chart"></i> Charts</h1>
      <p>Various type of charts for your project</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li><a href="#">charts</a></li>
      </ul>
    </div>
  </div>
  <div class="row">            
    <div class="clearfix"></div>
    <div class="col-md-12">
      <div class="card">
        <h3 class="card-title">Votos por Candidato</h3>
        <div class="embed-responsive embed-responsive-16by9">
          <canvas  width="800" height="500"  class="embed-responsive-item" id="pieChartDemo"></canvas>
        </div>
      </div>
    </div>    
  </div>
</div>
    <script type="text/javascript">
      $(document).ready(function() {    
        cargarGrafico();
        
        


      function cargarGrafico() {
         //llamar a la comunaByIdRrgion para cargar selectComunas
         $.ajax({
            type: 'GET',
            url: '?c=persona&a=getVotos',
            dataType: 'json',
            success: function(response) {                                               
                if (response.error) {
                    console.error('Error:', response.error);
                } else {                                        
                    var pdata = response.votos;
                    var ctxp = $("#pieChartDemo").get(0).getContext("2d");
                    var barChart = new Chart(ctxp).Pie(pdata);
                }                                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Manejo de errores de AJAX
                console.error('Error de AJAX:',jqXHR, textStatus, errorThrown);
            }
          }); 
        
      }
        
    });
      
                  
    </script>