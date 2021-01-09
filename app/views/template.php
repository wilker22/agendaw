<!doctype html>
<html lang="pt-br">	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<title>mjailton</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/js/datatables/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/js/datatables/css/responsive.dataTables.min.css">
		<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/DataTables_boot.css">
		<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/auxiliar.css">
		<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/grade.css">
		<link rel="stylesheet" href="<?php echo URL_BASE ?>assets/css/style.css">
		<script src="<?php echo URL_BASE ?>assets/js/jquery.min.js"></script>
		<!--font icones-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<script> 
			var base_url="<?php echo URL_BASE ?>";
		</script>
	</head>
<body>

 		<?php include "cabecalho.php" ?>
        <div class="conteudo">
			<section class="caixa">            
                <?php $this->load($view, $viewData); ?>
          </section>
		</div>
        <?php include "rodape.php" ?>	
        
        
		<script src="<?php echo URL_BASE ?>assets/js/datatables/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo URL_BASE ?>assets/js/datatables/js/dataTables.responsive.min.js"></script>
		<script src="<?php echo URL_BASE ?>assets/js/jquery.mask.js"></script>
		<script src="<?php echo URL_BASE ?>assets/js/js.js"></script>
</body>
</html>