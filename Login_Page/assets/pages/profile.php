<?php global $user;
global $profile;
global $profile_post; ?>
<div class="container col-9 rounded-0">
    <div class="col-12 rounded p-4 mt-4 d-flex gap-5">
        <div class="col-4 d-flex justify-content-end align-items-start"><img src="assets/images/<?= $profile['profile_pic'] ?>" class="assets/images/img-thumbnail rounded-circle my-3" style="height:170px;" alt="...">
        </div>
        <div class="col-8">
            <div class="d-flex flex-column">
                <div class="d-flex gap-5 align-items-center">
                    <span style="font-size: xx-large; text-transform:capitalize"><?= $profile['first_name'] ?> <?= $profile['last_name'] ?></span>
                    <?php
                    if ($user['id'] != $profile['id']) {
                    ?>
                        <div class="dropdown">
                            <span class="" style="font-size:xx-large" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i> </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-chat-fill"></i> Message</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-x-circle-fill"></i> Block</a></li>
                            </ul>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <span style="font-size: larger;" class="text-secondary">@<?= $user['username'] ?></span>
                <div class="d-flex gap-2 align-items-center my-3">

                    <a class="btn btn-sm btn-primary"><i class="bi bi-file-post-fill"></i> <?= count($profile_post) ?> Posts</a>
                    <a class="btn btn-sm btn-primary " data-bs-toggle="modal" data-bs-target="#follow_list"><i class="bi bi-people-fill "></i> <?= count($profile['followers']) ?> Followers</a>
                    <!-- how many people follow me -->
                    <a class="btn btn-sm btn-primary <?= count($profile['following']) < 1 ? 'disabled' : '' ?>" data-bs-toggle="modal" data-bs-target="#following_list"><i class="bi bi-person-fill"></i> <?= count($profile['following']) ?> Following</a>

                    <!-- how many people me follow -->

                </div>
            </div>
            <?php

            if($user['id'] != $profile['id']){
            if (checkFollowStatus($profile['id']) ) {
            ?>

                <button class="btn btn-sm btn-danger unfollowbtn" data-user-id='<?= $profile['id'] ?>'>Unfollow</button>

            <?php
            } else {
            ?>
                <button class="btn btn-sm btn-primary followbtn" data-user-id='<?= $profile['id'] ?>'>Follow</button>

            <?php
            }
        }
            ?>
        </div>

    </div>
    <h3 class="border-bottom">Posts</h3>
    <?php
    if (count($profile_post) < 1) {
        echo "<p class='text-center p-2 border rounded' style ='background-color:pink;' ><b>You don't have any post</b></p>";
    }
    ?>
    <div class="gallery d-flex flex-wrap justify-content gap-2 mb-4">
        <?php
        foreach ($profile_post as $post) {
        ?>
            <img src="assets/images/img/<?= $post['post_img'] ?>"  data-bs-toggle="modal" data-bs-target="#postview<?=$post['id']?>" width="260px" class="rounded" />
            
            <div class="modal fade" id="postview<?=$post['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body d-flex p-0">
                <div class="col-8">
                    <img src="assets/images/img/<?=$post['post_img']?>" class="w-100 rounded-start">
                </div>



                <div class="col-4 d-flex flex-column">
                    <div class="d-flex align-items-center p-2 border-bottom">
                        <div><img src="assets/images/<?=$profile['profile_pic']?>" alt="" height="50" class="rounded-circle border">
                        </div>
                        <div>&nbsp;&nbsp;&nbsp;</div>
                        <div class="d-flex flex-column justify-content-start align-items-center">
                            <h6 style="margin: 0px;"><?= $profile['first_name'] ?> <?= $profile['last_name'] ?></h6>
                            <p style="margin:0px;" class="text-muted">@<?= $profile['username'] ?></p>
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
        <?php
       
    
        }
        ?>
    </div>

</div>

<!-- Button trigger modal -->

<!-- Modal -->

<!-- this is for following list -->
<div class="modal fade" id="follow_list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Followers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                foreach ($profile['followers'] as $f) {
                    $fuser = getUser($f['follower_id']);
                    $fbtn = '';
                    if (checkFollowStatus($f['follower_id'])) {
                        $fbtn = '<button class="btn btn-sm btn-danger unfollowbtn" data-user-id=' . $fuser['id'] . ' >Unfollow</button>';
                    } else if ($user['id'] == $f['follower_id']) {
                        $fbtn = '';
                    } else {
                        $fbtn = '<button class="btn btn-sm btn-primary followbtn" data-user-id=' . $fuser['id'] . ' >Follow</button>';
                    }
                ?>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center p-2">
                            <div>
                                <a href="?u=<?= $fuser['username'] ?>"> <img src="assets/images/<?= $fuser['profile_pic'] ?>" alt="" height="40" class="rounded-circle border">
                                </a>
                            </div>
                            <div>&nbsp;&nbsp;</div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 style="margin: 0px;font-size: small; text-transform:capitalize"><?= $fuser['first_name'] ?></h6>
                                <p style="margin:0px;font-size:small" class="text-muted">@<?= $fuser['username'] ?></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center ">
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

<!-- this is for following list -->
<!-- this is for following list -->
<div class="modal fade" id="following_list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Following</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
foreach($profile['following'] as $f){
    $fuser = getUser($f['user_id']);
    $fbtn='';
    if(checkFollowStatus($f['user_id'])){
        $fbtn = '<button class="btn btn-sm btn-danger unfollowbtn" data-user-id='.$fuser['id'].' >Unfollow</button>';
    }else if($user['id']==$f['user_id']){
        $fbtn='';
    }else{
        $fbtn = '<button class="btn btn-sm btn-primary followbtn" data-user-id='.$fuser['id'].' >Follow</button>';

    }
    ?>
<div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center p-2">
                        <div>
                        <a href='?u=<?=$fuser['username']?>'><img src="assets/images/<?=$fuser['profile_pic']?>" alt="" height="40" width="40" class="rounded-circle border"></a>
                        </div>
                        <div>&nbsp;&nbsp;</div>
                        <div class="d-flex flex-column justify-content-center">
                            <a href='?u=<?=$fuser['username']?>' class="text-decoration-none text-dark"><h6 style="margin: 0px;font-size: small;"><?=$fuser['first_name']?> <?=$fuser['last_name']?></h6></a>
                            <p style="margin:0px;font-size:small" class="text-muted">@<?=$fuser['username']?></p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <?=$fbtn?>

                    </div>
                </div>
    <?php
}
                ?>
            </div>
   
        </div>
  </div>
</div>