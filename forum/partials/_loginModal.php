
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginModalLabel">Login to iDiscuss</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" action="/forum/partials/_handlelogin.php" method="post">
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Username</label>
                <!--<input type="email" class="form-control" id="loginEmail" name="loginEmail" placeholder="name@example.com">-->
                <input type="text" class="form-control" id="loginEmail" name="loginEmail" placeholder="username">
                </div>
            <div class="col-auto">
                <label for="loginPass" class="visually-hidden">Password</label>
                <input type="password" class="form-control" id="loginPass" name="loginPass" placeholder="Password">
            </div>
            <div >
                <button type="submit" class="btn btn-primary mb-3">Login</button>
            </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       


      </div>
        </form>
    </div>
  </div>
</div>