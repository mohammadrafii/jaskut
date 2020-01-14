<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
  $where = '';
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
  }

?>
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
	        	<div class="col-sm-9">
	        		
	        		
		           
					
		       		<?php
                    $conn = $pdo->open();

                    try{
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM products $where ORDER BY id DESC");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                        $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                        echo "
                          <div class='col-sm-4'>
	       		     <div class='box box-solid'>
		       	     <div class='box-body prod-body'>
					 <center>
		       	     <img src='".$image."' width='230px' height='230px' class='thumbnail'></center>
		       	     <h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
					 <div class='rating' style='color:#f39c12;'>
					 <i class='fa fa-star' aria-hidden='true' ></i>
					 <i class='fa fa-star' aria-hidden='true'></i>
					 <i class='fa fa-star' aria-hidden='true'></i>
					 <i class='fa fa-star' aria-hidden='true'></i>
					 <i class='fa fa-star' aria-hidden='true'></i>
					 </div>
		       		</div><br>
					
									
											
		       								<div class='box-footer'>
											
		       									<b>Rp ".number_format($row['price'],0,",",".")."</b>
												<h5><p style='color:grey'>Asal : ".$row['lokasi']."</p></h5>
												
		       								</div>
	       								</div>
	       							</div>
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>

	        	</div>
				<br>
				<div class="col-sm-3">
	        		<?php include 'includes/sidebarhome.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
    <?php include 'includes/products_modal.php'; ?>  
  	<?php include 'includes/footer.php'; ?>
	
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