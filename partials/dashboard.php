
<section>
    <h3 class="section-title text-light">
        Overview
    </h3>

    <div class="row" id="departmentsRow">
        <div class="col-md-4">
            <div class="memo-department">
                <div class="memo-count">
                    <em class="text-light">
                        <?php echo sprintf("%02d", memoInfo::myMemoCount($con,$_SESSION['user_id'],0)); ?>
                    </em>
                    <span>Memos Found</span>
                </div>
                <span>Inbox Memos</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="memo-department">
                <div class="memo-count">
                    <em class="text-light">No</em>
                    <span>Memos Found</span>
                </div>
                <span>
                    Received Memos as UFS
                 </span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="memo-department">
                <div class="memo-count">
                    <em class="text-light">No</em>
                    <span>Memos Found</span>
                </div>
                <span>Memo Drafts</span>
            </div>
        </div>
    </div>
</section>

<section>

    <?php
    $user_id = $_SESSION['user_id'];
    $result = memoInfo::getBroadcastMemo($con,$_SESSION['dept_id']);

    if(!is_null($result)){ ?>
        <h3 class="section-title text-light">
            Broadcasted Memo  <a href="allbroadcasts.php" style="float: right">View All</a>
        </h3>

        <div>
            <?php
            $i=1;
            foreach ($result as $data) {
                if($i <=3 ){?>
                <a href="broadcast_read.php?memo_id=<?php echo $data['id']; ?>" class="memo-item">
                    <span class="date">
                        <?php echo date("d  M \'y", strtotime($data['created_at'])); ?>
                    </span>
                    <h4><?php echo $data['title'] ?> &nbsp;<i class="zmdi zmdi-chevron-right"></i> &nbsp; <?php echo getDepartment::getdept($con, $_SESSION['dept_id']) ?></h4>
                    <p class="trim-text"><?php echo $data['body'] ?> </p>
                </a>
                <?php
            }  $i++; } ?>
        </div>
    <?php } ?>

</section>