<style>
#x1:hover {
background:#ff0000!important;
 cursor: pointer;
}
#x2:hover {
background:#ff0000!important; cursor: pointer;
}
</style>
<?php

  $kind=UserData::getById($_SESSION["user_id"])->kind;
  $dateB = new DateTime(date('Y-m-d')); 
  $dateA = $dateB->sub(DateInterval::createFromDateString('30 days'));
  $sd= strtotime(date_format($dateA,"Y-m-d"));
  $ed = strtotime(date("Y-m-d"));
  $ntot = 0;
  $nsells = 0;
  $sumatot = array();
for($i=$sd;$i<=$ed;$i+=(60*60*24)){  
 $operations[$i] = CGData::getGraficarHistorial(date("Y-m-d",$i),date("Y-m-d",$i));
 $operations2[$i] = VTAData::getGraficarHistorial(date("Y-m-d",$i),date("Y-m-d",$i));
}

?>
    <section class="content-header">
      <h1>
        DashBoard
        <small>
		<?php 
		echo UserData::getById($_SESSION["user_id"])->name;
		
		?>
		</small>
      </h1>
	  
    </section>

<section class="content">

 <div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">	
	  <div class="info-box">
		<span id="x1" class="info-box-icon bg-yellow" onclick="visualiza_x(true,<?php echo $kind;?>)"><i class="fa fa-ticket"></i></span>
		<div class="info-box-content">
		  <span class="info-box-text">Compras Y gastos</span>
		  <span class="info-box-number"><?php echo count(CGData::getCountGC());?></span>
		</div>
		<!-- /.info-box-content -->
		<?php if($kind==1 || $kind==2):?>
		<a href="./?view=newGR" class="box-title ">Crear</a>
		<?php endif;?>
	  </div>
	  <!-- /.info-box -->
	  
	</div>	
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span id="x2" class="info-box-icon bg-purple" onclick="visualiza_x(false,<?php echo $kind;?>)"><i class="fa fa-support"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ventas</span>
              <span class="info-box-number">
			 
			  <?php echo count(VTAData::getCountGC());?>
			  </span>
            </div>
            <!-- /.info-box-content -->
			<?php if($kind==1 || $kind==3):?>
			<a href="./?view=newvta" class="box-title ">Crear   </a>
			<?php endif;?>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

      

        <!-- /.col -->
      </div>
      <!-- /.row -->


<div class="row">



<!-- Ultimos gastos creados-->
<!-- TABLE: LATEST ORDERS -->
<div class="col-md-12">
          <div class="box box-info" id="b1">
            <div class="box-header with-border">
              <h3 class="box-title">Ultimos Gastos y Compras Creados</h3>
			  
	
              <div class="box-tools pull-right">
			  <a href="./?view=newGR" class="box-title ">Crear   </a>
			  |
			  <a href="#" class="box-title " onclick="prox()">Reporte...</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>                    
					<th>#</th>
                    <th>Clasificacion</th>
                    <th>Proveedor</th>
					<th>Formas de Pago</th>
					<th>No. Documento</th>
					<th>Total</th>
					<th></th>
                    
                  </tr>
                  </thead>
                  <tbody>
				  <?php foreach(CGData::getLastCG() as $user):
					//$project  = $user->getProject();
					//$Dep  = $user->getCategory();
				  ?>
                  <tr>
				  <td><a href='./?view=openGC&id=<?php echo md5($user->id);?>'>#<?php echo $user->id; ?></a></td>
                    <td> <?php echo $user->Clasificacion; ?></td>
                    <td><?php echo $user->Proveedor; ?></td>
					<td><?php echo $user->FormasDePago; ?></td>
					<td><?php echo $user->numero_documento; ?></td>
					<td><?php echo $user->total; ?></td>
					
					<td style="width:180px;">
					<a href="#" class="btn btn-danger btn-xs" onclick="DelGC('<?php echo $user->numero_documento;?>','<?php echo $user->id;?>')" data-toggle="modal" data-target="#modal-borrar">Borrar </a>
					</td>
					
					
					
                  </tr>
				  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
			
            <!-- /.box-body -->
			</div><!-- /.box-info-->
<!-- Fin Ultimos gastos creados-->
</div><!--/.Fin col-md8 -->

<!-- Ultimos ventas creados-->
<!-- TABLE: LATEST ORDERS -->
<div class="col-md-12">
          <div class="box box-info" id="b2">
            <div class="box-header with-border">
              <h3 class="box-title">Ultimos ventas Creadas99</h3>
			  
	
              <div class="box-tools pull-right">
			  <a href="./?view=newVTa" class="box-title ">Crear   </a>
			  |
			  <a href="#" class="box-title " onclick="prox()">Reporte...</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>                    
					<th>#</th>
                    <th>Ref</th>
                    <th>Factura</th>
					<th>almacen</th>
					<th>usuario</th>
					<th>Total</th>
					<th></th>
                    
                  </tr>
                  </thead>
                  <tbody>
				  <?php foreach(VTAData::getLastVta() as $xVTAData):
					
				  ?>
                  <tr>
				  <td><a href='./?view=vta&id=<?php echo md5($xVTAData->id);?>'>#<?php echo $xVTAData->id; ?></a></td>
                    <td> <?php echo $xVTAData->no_referencia; ?></td>
                    <td><?php echo $xVTAData->no_factura; ?></td>
					<td><?php echo $xVTAData->nombre; ?></td>
					<td><?php echo $xVTAData->name; ?></td>
					<td><?php echo $xVTAData->total; ?></td>
					
					<td style="width:180px;">
					<a href="#" class="btn btn-danger btn-xs" onclick="Delvta('<?php echo $xVTAData->no_factura;?>','<?php echo $xVTAData->id;?>')" data-toggle="modal" data-target="#modal-borrarvta">Borrar </a>
					</td>
					
					
					
                  </tr>
				  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
			
            <!-- /.box-body -->
			</div><!-- /.box-info-->
<!-- Fin Ultimos ventas creados-->
</div><!--/.Fin col-md8 -->


</div><!-- /.row-->



	
<div class="row">
<div class="col-md-12">
<div class="box box-primary">
<div class="box-header">
<div class="box-title">Gastos de los ultimos 30 dias</div>
</div>
<div class="box-body">
<div id="graph" class="animate" data-animate="fadeInUp" ></div>
</div>

</div>
</div>


</div>
	  




<script>

<?php 
echo "var c=0;";
echo "var dates=Array();";
echo "var data=Array();";
echo "var total=Array();";
for($i=$sd;$i<=$ed;$i+=(60*60*24)){
  echo "dates[c]=\"".date("Y-m-d",$i)."\";";
  echo "data[c]=".$operations[$i][0]->s.";";
  echo "total[c]={x: dates[c],y: data[c]};";
  echo "c++;";
}
?>
Morris.Area({
  element: 'graph',
  data: total,
  xkey: 'x',
  ykeys: ['y',],
  labels: ['Y']
}).on('click', function(i, row){
  //console.log(i, row);
});
</script>

<script>

function prox(){alert('Proximamente')};
function DelGC(nombre,id)
	   {
		   
		   $('#delNameFC').val(nombre);	   
		   $('#deGCId').val(id);	    
	   }
	   
	   function Delvta(nombre,id)
	   {
		   
		   $('#delNamevta').val(nombre);	   
		   $('#deVTAId').val(id);	    
	   }
	   $('#b2').hide();	    
	   $('#b1').show();	    
	   function visualiza_x(x,kind)//true compras
	   {		   	   
		   if(x==false && (kind=="3" || kind=="1"))
		   {			   
			   $('#b1').hide();	    
			   $('#b2').show();	    
		   }else if (x==true && (kind=="2" || kind=="1")) 
		   {
			   
			   $('#b2').hide();	    
			   $('#b1').show();	
		   }
	   } 
</script>
<?php if($kind==3): ?>
<script>visualiza_x(false,3);</script>
<?php endif;?>
<br><br>
</section>

	<div class="modal fade" id="modal-borrar">
          <div class="modal-dialog">		  
            <div class="modal-content">
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=delGC" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Borrar Gasto/Compra</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Confirmar que desea Borrar el GC:</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">#*</label>
			<div class="col-md-6">
			  <input type="text" name="delNameFC" class="form-control" id="delNameFC" readonly=true>
			</div>
		  </div>		  		 
			<input type="hidden" id="deGCId" name="deGCId" value="">
		</div>
	</div>
				<!---------------------------------------------------->
              </div>
              <div class="modal-footer">
			  
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
              </div>
			  </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
		<div class="modal fade" id="modal-borrarvta">
          <div class="modal-dialog">		  
            <div class="modal-content">
			<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=delvta" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Borrar Venta</h4>
              </div>
              <div class="modal-body">                				
				<div class="row">
	<div class="col-md-12">
      <h2 class="title">Confirmar que desea Borrar La venta:</h2>

		
		  <div class="form-group">
			<label for="inputEmail1" class="col-lg-2 control-label">#*</label>
			<div class="col-md-6">
			  <input type="text" name="delNamevta" class="form-control" id="delNamevta" readonly=true>
			</div>
		  </div>		  		 
			<input type="hidden" id="deVTAId" name="deVTAId" value="">
		</div>
	</div>
				<!---------------------------------------------------->
              </div>
              <div class="modal-footer">
			  
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
              </div>
			  </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		