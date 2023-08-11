

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="signupModalLabel">signup to iDiscuss</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" action="/forum/partials/_handleSignup.php" method="post">
            <div class="mb-3">
                <label for="signupemail" class="form-label">Username</label>
                <!--<input type="email" class="form-control" id="signupemail" name="signupemail" placeholder="name@example.com">-->
                <input type="text" class="form-control" id="signupemail" name="signupemail" placeholder="username">
                </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Password</label>
                <input type="password" class="form-control" id="signuppassword" name="signuppassword" placeholder="Password">
            </div>
            <div >
                <label for="cpassword" class="visually-hidden">Confirm Password</label>
                <input type="password" class="form-control" id="signupcpassword" name="signupcpassword" placeholder="Password">
            </div>
            <div >
                <button type="submit" class="btn btn-primary mb-3">SignUp</button>
            </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       


      </div>
        </form>
    </div>
  </div>
</div>