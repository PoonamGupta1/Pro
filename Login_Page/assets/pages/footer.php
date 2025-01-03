<!-- Modal -->
<div class="modal fade" id="addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="" id="post_img" style="display: none;" class="w-100 rounded border">
        <form method="post" action="assets/php/actions.php?addpost" enctype="multipart/form-data">
          <div class="my-3">

            <input class="form-control" type="file" name="post_img" id="select_post_img">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Say Something</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="post_text"></textarea>
          </div>
            <button type="submit" class="btn btn-primary">Post</button>
          
        </form>
      </div>
    </div>
  </div>


  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery-3.7.1.js"></script>
  <script src="assets/js/custom.js?v=<?=time()?>"></script>
  </body>


  </html>