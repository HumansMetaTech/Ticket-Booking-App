<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login As Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="assets/partials/_handleLogin.php" method="POST">
          <div class="mb-3">
          <label for="adminname" class="form-label">Username</label>
            <div class="form-control">
              <input type="text" class="input input-alt" id="adminname" name="adminname" placeholder="Username">
              <span class="input-border input-border-alt"></span>
            </div>
          </div>
          <div class="mb-3">
          <label for="adminname" class="form-label">Password</label>
            <div class="form-control">
              <input type="password" class="input input-alt" id="password" name="password" placeholder="Password">
              <span class="input-border input-border-alt"></span>
            </div>
          <div class="form-text">We'll never share your password with anyone else.</div>
            </div>
          <button type="submit" class="btn btn-success" name="submit">Login</button>
        </form>
      </div>
      <div class="modal-footer">
        <!-- Add anything here in the future -->
      </div>
    </div>
  </div>
</div>