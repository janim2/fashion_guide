        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Add Client  <?= $response; ?></h4>
                        <hr class="mb-3">
                        <form method="POST" id="client_form" enctype="multipart/form-data" action="client-add.php">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="" id="full_name"
                                        name="full_name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Phone Number 1</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="" id="phone_number_1"
                                        name="phone_number_1" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Phone Number 2</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="" id="phone_number_2"
                                        name="phone_number_2">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Residential
                                    Address</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="" id="residential_address"
                                        name="residential_address" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" placeholder="" id="email" name="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" id="gender"
                                        name="gender" required>
                                        <option value="" selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body male_layout">
                        <h4 class="header-title mb-4">Male Measurement Form</h4>
                        <hr class="mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">
                                        <h3 class="text-primary">Trouser</h3>
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">Waist</label>
                                    <input type="text" class="form-control" id="male_trouser_waist"
                                        name="male_trouser_waist">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-lastname-input">Seat</label>
                                    <input type="text" class="form-control" id="male_trouser_seat"
                                        name="male_trouser_seat">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">Thigh</label>
                                    <input type="text" class="form-control" id="male_trouser_thigh"
                                        name="male_trouser_thigh">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">Knee</label>
                                    <input type="text" class="form-control" id="male_trouser_knee"
                                        name="male_trouser_knee">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-phoneno-input">Bass</label>
                                    <input type="text" class="form-control" id="male_trouser_bass"
                                        name="male_trouser_bass">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Trouser
                                        Lenght</label>
                                    <input type="text" class="form-control" id="male_trouser_lenght"
                                        name="male_trouser_lenght">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">
                                        <h3 class="text-primary">Shirt</h3>
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-phoneno-input">Chest</label>
                                    <input type="text" class="form-control" id="male_shirt_chest"
                                        name="male_shirt_chest">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Back</label>
                                    <input type="text" class="form-control" id="male_shirt_back" name="male_shirt_back">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-phoneno-input">Sleeve
                                        (Short)</label>
                                    <input type="text" class="form-control" id="male_shirt_short_sleeve"
                                        name="male_shirt_short_sleeve">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input"> Sleeve
                                        (Long)</label>
                                    <input type="text" class="form-control" id="male_shirt_long_sleeve"
                                        name="male_shirt_long_sleeve">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-phoneno-input">Around Arm</label>
                                    <input type="text" class="form-control" id="male_shirt_around_arm"
                                        name="male_shirt_around_arm">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Cuff</label>
                                    <input type="text" class="form-control" id="male_shirt_cuff" name="male_shirt_cuff">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Shirt Lenght</label>
                                    <input type="text" class="form-control" id="male_shirt_lenght"
                                        name="male_shirt_lenght">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">
                                        <h3 class="text-primary">Agbada</h3>
                                    </label>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-phoneno-input">Back (Arm -
                                        Arm)</label>
                                    <input type="text" class="form-control" id="male_agbada_back"
                                        name="male_agbada_back">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Length</label>
                                    <input type="text" class="form-control" id="male_agbada_length"
                                        name="male_agbada_length">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body female_layout" style="display:none">
                        <h4 class="header-title mb-4">Female Measurement Form</h4>
                        <hr class="mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">
                                        <h3 class="text-primary">Skirt</h3>
                                    </label>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">Waist</label>
                                    <input type="text" class="form-control" id="female_skirt_waist" name="female_skirt_waist">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-lastname-input">Hip</label>
                                    <input type="text" class="form-control" id="female_skirt_hip" name="female_skirt_hip">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">Knee</label>
                                    <input type="text" class="form-control" id="female_skirt_knee" name="female_skirt_knee">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">Waist -
                                        Hip</label>
                                    <input type="text" class="form-control" id="female_skirt_waist_hip" name="female_skirt_waist_hip">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-phoneno-input">Waist -
                                        Knee</label>
                                    <input type="text" class="form-control" id="female_skirt_waist_knee"
                                        name="female_skirt_waist_knee">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Skirt Lenght</label>
                                    <input type="text" class="form-control" id="female_skirt_skirt_lenght"
                                        name="female_skirt_skirt_lenght">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">
                                        <h3 class="text-primary">Top | Dress</h3>
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-phoneno-input">Bust</label>
                                    <input type="text" class="form-control" id="female_dress_bust" name="female_dress_bust">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Under Bust</label>
                                    <input type="text" class="form-control" id="female_dress_under_bust"
                                        name="female_dress_under_bust">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-phoneno-input">Waist</label>
                                    <input type="text" class="form-control" id="female_dress_waist" name="female_dress_waist">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input"> Shoulder</label>
                                    <input type="text" class="form-control" id="female_dress_shoulder" name="female_dress_shoulder">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-phoneno-input">Shoulder -
                                        Nipple</label>
                                    <input type="text" class="form-control" id="female_dress_shoulder_nipple"
                                        name="female_dress_shoulder_nipple">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Shoulder - Under
                                        Bust</label>
                                    <input type="text" class="form-control" id="female_dress_shoulder_under_bust"
                                        name="female_dress_shoulder_under_bust">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Shoulder -
                                        Waist</label>
                                    <input type="text" class="form-control" id="female_dress_shoulder_waist"
                                        name="female_dress_shoulder_waist">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Nipple -
                                        Nipple</label>
                                    <input type="text" class="form-control" id="female_dress_nipple_nipple"
                                        name="female_dress_nipple_nipple">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Shoulder -
                                        Hip</label>
                                    <input type="text" class="form-control" id="female_dress_shoulder_hip"
                                        name="female_dress_shoulder_hip">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Shoulder -
                                        Knee</label>
                                    <input type="text" class="form-control" id="female_dress_shoulder_knee"
                                        name="female_dress_shoulder_knee">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Top length</label>
                                    <input type="text" class="form-control" id="female_dress_top_lenght"
                                        name="female_dress_top_lenght">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Dress Length</label>
                                    <input type="text" class="form-control" id="female_dress_lenght" name="female_dress_lenght">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">
                                        <h3 class="text-primary">Trouser</h3>
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">Waist</label>
                                    <input type="text" class="form-control" id="female_trouser_waist"
                                        name="female_trouser_waist">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-lastname-input">Seat</label>
                                    <input type="text" class="form-control" id="female_trouser_seat"
                                        name="female_trouser_seat">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">Thigh</label>
                                    <input type="text" class="form-control" id="female_trouser_thigh"
                                        name="female_trouser_thigh">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-firstname-input">Knee</label>
                                    <input type="text" class="form-control" id="female_trouser_knee"
                                        name="female_trouser_knee">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-phoneno-input">Bass</label>
                                    <input type="text" class="form-control" id="female_trouser_bass"
                                        name="female_trouser_bass">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="progress-basicpill-email-input">Trouser
                                        Lenght</label>
                                    <input type="text" class="form-control" id="female_trouser_lenght"
                                        name="female_trouser_lenght">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row add-buttons">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <label class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-8">
                                    <div class="button-items">
                                        <input type="hidden" name="action" id="client_action">
                                        <input type="hidden" name="id" id="client_id">
                                        <button type="submit" id="add_client_btn" name="add_client_btn"
                                            class="btn btn-outline-success waves-effect waves-light">Add Client</button>
                                        <a href="client.php"
                                            class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </form>