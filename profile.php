<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='callout callout-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
	        					<div class='callout callout-success'>
	        						".$_SESSION['success']."
	        					</div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>
	        		<div class="box box-solid">
	        			<div class="box-body">
	        				<div class="col-sm-3">
	        					<img src="<?php echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg'; ?>" width="100%">
	        				</div>
	        				<div class="col-sm-9">
	        					<div class="row">
	        						
	        						<div class="col-sm-9">
	        							<h2><?php echo $user['firstname'].' '.$user['lastname']; ?>
										
	        								<span class="pull-right">
	        								<a href="#edit" class="btn btn-success btn-flat btn-sm" class='btn btn-primary btn-sm btn-flat' style="width:100%;height:100%;font:17px/normal Roboto, Arial, sans-serif;padding:9px;" data-toggle="modal"><i class="fa fa-edit"></i> Edit Profil</a><br><br>
											<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" class='btn btn-primary btn-sm btn-flat' style="width:100%;height:100%;font:17px/normal Roboto, Arial, sans-serif;padding:9px;"id="addproduct"><i class="fa fa-plus"></i> Pasang Iklan</a>
											</span>
										
										</h2>
	        							
	        							<h4><?php echo (!empty($user['contact_info'])) ? $user['contact_info'] : 'N/a'; ?></h4>
	        							<h4><i class="fa fa-map-marker" aria-hidden="true"> <?php echo (!empty($user['address'])) ? $user['address'] : 'N/a'; ?></h4></i>
	        							<h4><i class="fa fa-calendar" aria-hidden="true"> Bergabung <?php echo date('M d, Y', strtotime($user['created_on'])); ?></h4></i>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        		
					</div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/profile_modal.php'; ?>
	<?php include 'includes/products_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$(document).on('click', '.transact', function(e){
		e.preventDefault();
		$('#transaction').modal('show');
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'transaction.php',
			data: {id:id},
			dataType: 'json',
			success:function(response){
				$('#date').html(response.date);
				$('#transid').html(response.transaction);
				$('#detail').prepend(response.list);
				$('#total').html(response.total);
			}
		});
	});

	$("#transaction").on("hidden.bs.modal", function () {
	    $('.prepend_items').remove();
	});
	  $('#addproduct').click(function(e){
    e.preventDefault();
    getCategory();
  });

  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });
});
function getCategory(){
  $.ajax({
    type: 'POST',
    url: 'category_fetch.php',
    dataType: 'json',
    success:function(response){
      $('#category').append(response);
      $('#edit_category').append(response);
    }
  });
}
</script>
</body>
</html>