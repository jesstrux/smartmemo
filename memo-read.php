<?php
	$no_bootstrap = true;
	$css_file = "memo_read.css";
	include("partials/header.php");

	include("includes/getMemo.php");
	include("includes/getUsers.php"); 
	include("includes/getAttachment.php");
	include("includes/getResponses.php");

	$memo;
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
								$attachments = getAttachment::forMemo($con, $memo['id']); 

								if(count($attachments) > 0){
									// echo count($attachments) . " attachments";
									include 'partials/memo-read-attachments.php';
								}

								$responses = getResponses::forMemo($con, $memo['id']);

								if(count($responses) > 0){
									include 'partials/memo-read-responses.php';
								}
							?>

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

	<script>
		var memo_id = "<?php echo $_GET['memo_id']; ?>";
		var is_ufs = <?php echo $user_id != $memo['to_userid'] ? 'true' : 'false' ?>;
		// openModal('writeReply');

		function sendResponse(){
			var content = document.getElementById("replyBody").value;
			closeModal('writeReply');
			sendReply(2, content);
		}

		function sendReply(action, content){
			var data = {
				memo_id: memo_id,
                action: action,
				user_id : user_id
			};

			if(is_ufs){
				data['for_ufs'] = is_ufs;
			}

			if(content){
				data['content'] = content;
			}

			// return console.log(data);

			ajax("api/send_reply.php", data)
			.then(function(res){
				console.log("Success: " + res);
				showToast("Memo reply was sent.", "success");

				setTimeout(() => {
					window.location.reload();
				}, 500);
			})
			.catch(function (err) {
				if(err)
					console.log("Error: " + err);
				showToast("Failed to send reply.", "error");
			})
		}
	</script>
</body>
</html>