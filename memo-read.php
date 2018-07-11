<?php
	$no_bootstrap = true;
	$css_file = "memo_read.css";
	include("partials/header.php");

	include("includes/getMemo.php");
	include("includes/getUsers.php"); 
	include("includes/getAttachment.php"); 
?>
<link rel="stylesheet" href="css/staff_home.css">

<body class="show-na">
	<main class="layout">
		<?php include("partials/aside.php"); ?>

		<div id="siteContent" class="flex">
			<?php include("partials/navbar.php"); ?>

			<div id="mainContent">

				<?php
					$user_id= $_SESSION['user_id'];
					$result=getMemo::byId($con, $_GET['memo_id'], $user_id);
					$memo = mysqli_fetch_assoc($result);
				?>

				<section class="page-title layout vertical center-center">
					<h1 class="text-light">
						<?php echo $memo['title']; ?>
					</h1>
					<small class="text-light">
						<?php echo $memo['sent'] ? 'Sent To' : 'From' ?>: 
							<a href="profile.php?user_id=<?php echo $memo['other_user_id']; ?>" 
								class="link user-link">
								<?php echo getUsers::getFullname($con, $memo['other_user_id']) ?>
							</a>

							<?php 
								$ufs_result = getUfs::fromMemo($con, $memo['id']);
								$row_count = mysqli_num_rows($ufs_result);
								if($row_count > 0){
									echo "<div style='margin-top: 5px'></div> Ufs:";
								}
								$ufs_count = 1;
								while ($ufs = mysqli_fetch_array($ufs_result)) {
									echo '<a href="profile.php?user_id='. $ufs['user_id'] .'" class="link user-link">';
											echo getUsers::getFullname($con, $ufs['user_id']);
									echo '</a>';

									echo (($ufs_count != $row_count) ? "," : "");

									$ufs_count++;
								};
							?>
						<div style='margin-top: 5px'></div>
						<?php echo $memo['sent'] ? 'Sent' : 'Received' ?> On:
							<?php echo date("F jS Y", mktime($memo['created_at'])); ?>
					</small>
				</section>
				 <div class="section-wrapper">
					<section>
						<div id="memoContent">
							<div id="memoBody" style="padding-bottom: 2em">
								<?php echo nl2br($memo['body']); ?>
							</div>

							<?php
								$attachments_result = getAttachment::fromMemo($con, $memo['id']);
								$extra_s = mysqli_num_rows($attachments_result) != 1 ? 'S' : '';
								echo '<div id="attachments" label="'. mysqli_num_rows($attachments_result) . ' Attachment' . $extra_s . '">';
								while ($attachment = mysqli_fetch_array($attachments_result)) {
									$ext = end(explode(".",$attachment['document']));
									$type = $ext;
									if(in_array($ext, ["jpg", "png", "gif", "jpeg"]))
										$type = "image";

									echo '
										<a href="uploads/'. $attachment['document'] .'" class="attachment '.$type.'" target="blank">
											<i class="zmdi"></i>
											<span class="trim-text">'. $attachment['document'] .'</span>
										</a>
									';
								};

								echo '</div>';
							?>

							<div id="memoReplies" style="padding: 1.5em 0.7em; border-top: 1px solid #ddd">
								<h5 class="text-regular" style="margin-bottom: 1.3em;letter-spacing: 1px; color: #999; font-size: 0.9em;">MEMO REPLIES</h5>
								
								<div class="memo-reply layout start">
									<div style="position: relative; background: #ddd; margin-right: 12px; width: 40px; height: 40px; border-radius: 50px;">
										<img class="dp" src>
									</div>

									<div class="text flex">
										<h3 class="text-bold">Walter Kimaro</h3>
										<p class="text-light" style="font-size: 1.1em; line-height: 1.4em; margin-top: 0.3em">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem possimus magnam eum! Blanditiis eum obcaecati maiores ea saepe nobis sapiente? Blanditiis repudiandae dignissimos nihil voluptas, error at deserunt velit nam!
										</p>
									</div>
								</div>
							</div>

							<div style="padding-left: 0.7em; padding-top: 1.5em; border-top: 1px solid #ddd">
								<?php
									if(!$memo['sent'])
										echo '<button type="submit" class="rounded-btn imperfect" onclick="openModal(\'replyOptions\');">Reply to memo</button>';
									else
										echo '<button type="submit" class="rounded-btn imperfect" name="draft">View memo replies</button>';
								?>
							</div>
						</div>
					</section>
				 </div>

				<footer class="layout center-justified">
					Coyright &copy; Smart Memo 2018
				</footer>
			</div>
		</div>
	</main>

	<?php
		include 'partials/reply-options-modal.php';
		include 'partials/write-reply-modal.php';
	?>
	
	<?php include("partials/js.php"); ?>
</body>
</html>