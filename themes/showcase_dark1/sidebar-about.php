<div class="grid_4 clearfix">
    <div id="right">
	    <div class="rightBox clearfix">
			<h3>Our Team</h3>
			
				<?php 
					$users = get_users();
					$numbUser = 0;
					foreach($users as $users){
						$numbUser = $numbUser+1;
					}
					for($i = 2; $i <= $numbUser; $i++){
						$userMeta = get_user_meta($i);
				?>
				<div class="member clearfix member-details">				
					<div class="avatar"><a href="<?php echo bloginfo('url').'/'.$userMeta[first_name][0].'-'.$userMeta[last_name][0]; ?>"><?php echo get_avatar($i); ?></a></div>		
					<div>
						<div class="name"><?php echo $userMeta[first_name][0].' '.$userMeta[last_name][0]; ?></div>
						<div class="email"><?php echo $userMeta[job_position][0]; ?></div>
						<?php if($userMeta[Facebook][0] != null){ ?>
						<div><a target="_blank" href="<?php echo $userMeta[Facebook][0]; ?>" />FaceBook</a></div>
						<?php }; ?>
						<?php if($userMeta[Twitter][0] != null){ ?>
						<div><a target="_blank" href="<?php echo $userMeta[Twitter][0]; ?>" />Twitter</a></div>
						<?php }; ?>
					</div>
				</div>			
				<div class="role"><em><?php echo $userMeta[description][0] ?></em></div>
				<?php	}; ?>
			
        </div>
		<?php
			dynamic_sidebar('ds-1');
		?>
 
    </div>
</div>