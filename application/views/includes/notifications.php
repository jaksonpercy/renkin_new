<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if ($this->session->flashdata('alert')): $time = time();  ?>
	<?php
		if(count(getNewNotif()) > 0){
			if(count(getNewNotif()) == 1){
				echo '
				<section style="padding: 15px; padding-bottom:0px;">
					<div class="alert alert-danger" >
						<p>'.getNewNotif()[0]->judul_notifikasi.'</p>
					</div>
				</section>
				';
			}else{
				echo '
				<section style="padding: 15px;">
					<div class="alert alert-danger" >
						<p>Anda mempunyai '.count(getNewNotif()).' notifikasi yang belum dibaca. <a style="float:right" href="'.url('Dashboard/notification').'">'.lang('see_all_notifications').'</a></p>
					</div>
				</section>
				';
			}
		}
	?>
	

	<!--section style="padding: 15px;">
		<div class="alert alert-<?php echo $this->session->flashdata('alert-type') ?>" id="alert-<?php echo $time ?>">
			<p><?php echo $this->session->flashdata('alert') ?></p>
		</div>
	</section-->

	<script>
		setTimeout(function() {
			$('#alert-<?php echo $time ?>').hide().remove();
		}, 5000)
	</script>
	
<?php endif ?>