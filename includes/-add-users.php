                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                             <h4 class="header-title">Add Users  <?= $response; ?></h4>
                                            <hr class="mb-3">
                                             <form method="POST" id="users_form" enctype="multipart/form-data" action="users-add.php">
                                            <div class="row mb-3">
                                                <label for="example-email-input" class="col-sm-2 col-form-label">Full Name</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" placeholder="" id="full_name" name="full_name" />
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="example-url-input" class="col-sm-2 col-form-label">Phone Number</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" placeholder=""  id="phone_number" name="phone_number" />
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="example-date-input" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="email" value=""  id="username" name="username">
                                                </div>
                                            </div>
                                            
                                             <div class="row mb-3">
                                                <label for="example-date-input" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="password" id="password" name="password">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Role</label>
                                                <div class="col-sm-8">
                                                    <select class="form-select" aria-label="Default select example" id="role" name="role">
                                                        <option value=""></option>
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="staff">Staff</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                           
                                             <div class="row">
                                                <label class="col-sm-4 col-form-label"></label>
                                                    <div class="col-sm-8">
                                                        <div class="button-items">
                                                            <input type="hidden" name="action" id="users_action">
                                                            <input type="hidden" name="id" id="users_id">
                                                            <button type="submit" id="add_users_btn" name="add_users_btn"
                                                        class="btn btn-outline-success waves-effect waves-light">Add User
                                                            </button>
                                                    <a href="users.php"
                                                        class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->