<?php
global $user;
global $posts;
global $follow_suggestions; ?>

<div class="container col-9 rounded-0 d-flex justify-content-between" >
    <div class="col-8" >
        <?php

        showError('post_img');
        if (count($posts) < 1) {
            echo "<p class='text-center p-2 border rounded' style ='background-color:pink;' >No Posts or Add new Posts</p>";
        }
        foreach ($posts as $post) {
            $likes = getLikes($post['id']);
            $comments = getComments($post['id']);

        ?>
            <div class="card mt-4">
                <div class="card-title d-flex justify-content-between  align-items-center" >

                    <div class="d-flex align-items-center p-2" style="text-transform:capitalize">
                        <a href="?u=<?= $post['username'] ?>"> <img src="assets/images/<?= $post['profile_pic'] ?>" alt="" height="30" class="rounded-circle border"> </a>&nbsp;&nbsp;
                        <?= $post['first_name'] ?> <?= $post['last_name'] ?>
                    </div>
                    <div class="p-2">
                        <i class="bi bi-three-dots-vertical"></i>
                    </div>
                </div>
                <img src="assets/images/img/<?= $post['post_img'] ?>" class="" alt="...">
                <h4 style="font-size: x-larger" class="p-2 border-bottom ">
                    <span id="likebtns">
                    <?php
                    if(checkLikeStatus($post['id'])){
                        $like_btn_display ='none';
                        $unlike_btn_display='';

                    }else {
                        $like_btn_display ='';
                        $unlike_btn_display='none';

                    }
                        ?>
                    <i class="bi bi-suit-heart-fill unlike_btn" style="display:<?=$unlike_btn_display?>;color:red;" data-post-id='<?= $post['id'] ?>'></i>
                    <i class="bi bi-suit-heart like_btn" style="display:<?=$like_btn_display?>;" data-post-id='<?= $post['id'] ?>'></i>
                </span>
                <sup  data-bs-toggle="modal" data-bs-target="#likes<?=$post['id']?>"><span id="likecount<?=$post['id']?>"><?=count($likes)?></span> likes </sup>
               
                &nbsp;&nbsp;
                <i class="bi bi-chat-left " data-bs-toggle="modal" data-bs-target="#postview<?=$post['id']?>"><span >
           
                    </i>
                    <sup  data-bs-toggle="modal" data-bs-target="#postview<?=$post['id']?>"><span ></span> comments</span>
                    
                </sup>
                </h4>


                <?php
                if ($post['post_text']) { ?>
                    <div class="card-body">
                        <?= $post['post_text'] ?>
                    </div>
                <?php
                }
                ?>

                    
<div class="assets/images/input-group  border-0">
                        <input type="text" class="form-control rounded-0 border-0 comment-input" placeholder="say something.." aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-primary rounded-0 border-0 add-comment" type="button" data-cs="comment-section<?=$post['id']?>" data-post-id="<?=$post['id']?>" id="button-addon2">Post</button>
                    </div>
            </div>
          
            <!-- start -->
            <div class="modal fade" id="postview<?=$post['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

           <div class="modal-body d-flex p-0">
               <div class="col-8">
                    <img src="assets/images/img/<?=$post['post_img']?>" class="w-100 rounded-start">
                </div> 
                <div class="col-4 d-flex flex-column">
                    <div class="d-flex align-items-center p-2 border-bottom">
                        <div><img src="assets/images/<?=$post['profile_pic']?>" alt="" height="50" class="rounded-circle border">
                        </div>
                        <div>&nbsp;&nbsp;&nbsp;</div>
                        <div class="d-flex flex-column justify-content-start align-items-center">
                            <h6 style="margin: 0px;"><?= $post['first_name'] ?> <?= $post['last_name'] ?></h6>
                            <p style="margin:0px;" class="text-muted">@<?= $post['username'] ?></p>
                        </div>
                    </div>
                    <div class="flex-fill align-self-stretch overflow-auto" id="comment-section<?=$post['id']?>" style="height: 100px;">
                   
                    <?php
$comments = getComments($post['id']);
if(count($comments)<1){
    ?>
<p class="p-3 text-center my-2 nce">o comments</p>
    <?php
}
foreach($comments as $comment){
    $cuser = getUser($comment['user_id']);
    
    ?>
<div class="d-flex align-items-center p-2">
                                <div><img src="assets/images/<?=$cuser['profile_pic']?>" alt="" height="40" width="40" class="rounded-circle border">
                                </div>
                                <div>&nbsp;&nbsp;&nbsp;</div>
                                <div class="d-flex flex-column justify-content-start align-items-start">
                                    <h6 style="margin: 0px;"><a href="?u=<?=$cuser['username']?>" class="text-decoration-none text-muted">@<?=$cuser['username']?></a> - <?=$comment['comment']?></h6>
                                     </div>
                            </div>

    <?php
}
                          ?>
                    </div>


                    <div class="assets/images/input-group p-2 border-top">
                        <input type="text" class="form-control rounded-0 border-0 comment-input" placeholder="say something.." aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-primary rounded-0 border-0 add-comment" type="button" data-cs="comment-section<?=$post['id']?>" data-post-id="<?=$post['id']?>" id="button-addon2">Post</button>
                    </div>
                </div>

           </div>
            </div>
        </div>

            </div>

            <!-- end -->
                <!-- like status -->
                <div class="modal fade" id="likes<?=$post['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Following</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                if(count($likes)<1){
                    ?>
                    <p>Currently no likes <i class="bi bi-emoji-frown"></i></p>
                    <?php
                }
                foreach ($likes as $f) {
                    $fuser = getUser($f['user_id']);
                    $fbtn = '';
                    if (checkFollowStatus($f['user_id'])) {
                        $fbtn = '<button class="btn btn-sm btn-danger unfollowbtn" data-user-id=' . $fuser['id'] . ' >Unfollow</button>';
                    } else if ($user['id'] == $f['user_id']) {
                        $fbtn = '';
                    } else {
                        $fbtn = '<button class="btn btn-sm btn-primary followbtn" data-user-id=' . $fuser['id'] . ' >Follow</button>';
                    }
                ?>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center p-2">
                            <div>
                           <a href="?u=<?= $fuser['username'] ?>"><img src="assets/images/<?= $fuser['profile_pic'] ?>" alt="" height="40" width="40" class="rounded-circle border"></a>
                            </div>
                            <div>&nbsp;&nbsp;</div>
                            <div class="d-flex flex-column justify-content-center">
                                <a href='?u=<?= $fuser['username'] ?>' class="text-decoration-none text-dark">
                                    <h6 style="margin: 0px;font-size: small;"><?= $fuser['first_name'] ?> <?= $fuser['last_name'] ?></h6>
                                </a>
                                <p style="margin:0px;font-size:small" class="text-muted">@<?= $fuser['username'] ?></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <?= $fbtn ?>

                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>
    </div>
                    
            </div>
        <?php
        }
        ?>

    </div>

    <div class="col-4 mt-4 p-3">
        <div class="d-flex align-items-center p-2">
            <div>
                <a href="?u=<?= $user['username'] ?>"><img src="assets/images/<?= $user['profile_pic'] ?>" alt="" height="60" class="rounded-circle border"></a>
            </div>
            <div>&nbsp;&nbsp;&nbsp;</div>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h6 style="margin: 0px; text-transform:capitalize"> <?= $user['first_name'] ?> <?= $user['last_name'] ?></h6>
                <p style="margin:0px;" class="text-muted">@ <?= $user['username'] ?></p>
            </div>
        </div>
        <div>
            <h6 class="text-muted p-2">You Can Follow Them</h6>
            <?php
            foreach ($follow_suggestions as $suser) {
            ?>
                <div class="d-flex justify-content-between" >
                    <div class="d-flex align-items-center p-2">
                        <div class="d-flex align-items-end ">
                            <button class="btn btn-sm btn-primary followbtn" data-user-id='<?= $suser['id'] ?>'>Follow</button>
                        </div>
                        <div>&nbsp;&nbsp;&nbsp;</div>
                        <div class="d-flex flex-column justify-content-start" >
                            <h6 style="margin: 0px;font-size: small; text-transform:capitalize"><?= $suser['first_name'] ?></h6>
                            <p style="margin:0px;font-size:small" class="text-muted">@<?= $suser['username'] ?></p>
                        </div>
                        <div>
                            <a href="?u=<?= $suser['username'] ?>"> <img src="assets/images/<?= $suser['profile_pic'] ?>" alt="" height="40" class="rounded-circle border">
                            </a>
                        </div>
                    </div>
                </div>
            <?php

            }
            if (count($follow_suggestions) < 1) {
                echo '<h6 class="p-2 text-center" >No Suggestion For You</h6? ';
            }
            ?>


        </div>
    </div>
</div>