<?php
    $loadCmt = loadCmt();
    $dataCmt ="";
    if(isset($loadCmt)){
        foreach ($loadCmt as $value) {
            $starRate = $value['comment_rate'];
            $rateCmt = ratingCmt($starRate);
            $dataCmt .='
                <div class="media dashboard-message">
                    <div class="pr-4">
                        <img src="assets/img/avatar/'.$value['user_image'].'" alt="avatar">
                    </div>
                    <div class="media-body dashboard-message-text">
                        <h5>'.$value['user_name'].' <span>('.$value['comment_date'].')</span> 
                            <a href="admin.php?page=delete-comments&cmtID='.$value['comment_id'].'"><span class="pull-right new">Delete</span></a>
                        </h5>
                        <div class="rating">
                        ' . $rateCmt . '
                        </div>
                        <p>'.$value['comment_content'].'</p>
                        <span class="reply-mail clearfix">Reply : <a
                                href="mailto:'.$value['user_email'].'">'.$value['user_email'].'</a></span>
                    </div>
                </div>
            ';
        }
    }
?>
<div class="col-lg-9 offset-lg-3 col-md-12 col-sm-12 col-pad">
    <div class="content-area5">
        <div class="dashboard-content">
            <div class="dashboard-header clearfix">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h4>Reviews</h4>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="breadcrumb-nav">
                            <ul>
                                <li>
                                    <a href="index.php">Index</a>
                                </li>
                                <li>
                                    <a href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="active">Reviews</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-list">
                <h3>Reviews List</h3>
                <div class="dashboard-listd">
                    <?= $dataCmt ?>
                </div>
            </div>
        </div>
        <p class="sub-banner-2 text-center">© 2022 Theme Vessel. Trademarks and brands are the property of their
            respective owners.</p>
    </div>
</div>
</div>
</div>
</div>
<!-- Dashboard end -->