<h2 class="title-right-div a-dk h2-title-1"><span class="icon-title-h2-1 material-icons-outlined">account_box</span> My Profile</h2>
<hr style="margin-top: 10px">


<?php if ($role == "teacher") { ?>
<div style="margin-top: 20px" class="vertical-menu-2">
    <a class="vertical-options-2 active" href="#">My User</a>
    <a class="vertical-options-2" href="#">My Course</a>
</div>
<?php } ?>

<div style="margin-top: 20px" class="form-content-2 box-cont-1 p-40 cont-profile">
    <div class="tx-center">
        <div style="margin-top: 10px">
            <i class="profile-logo fa-solid <?php if ($role == "teacher") echo "fa-chalkboard-user";
                                            if ($role == "student") echo "fa-user-graduate"; ?>"></i>
        </div>
        <div style="margin-top: 15px">
            <span style="color: gray"><?php if ($role == "teacher") echo "teacher";
                                        if ($role == "student") echo "student"; ?></span>
        </div>


    </div>
    <hr style="margin-top: 20px">
    <form action="./controllers/update-user.php" method="post">
        <?php if (isset($_GET["error"])) { ?>
            <div class="form-element">
                <div style="font-size: 0.9rem" class="a-dk panel-error"><?= $_GET["error"] ?></div>
            </div>
        <?php  } else if (isset($_GET["message"]) && $_GET["message"] === "success") { ?>
            <div class="form-element">
                <div style="font-size: 0.9rem" class="a-dk panel-success">User updated successfully!</div>
            </div>
        <?php  } ?>
        <div style="margin-top: 20px">
            <h5>Username:</h5>
            <input class="w-100" required="required" type="text" name="username" placeholder="Username" value="<?= $username  ?>">
        </div>
        <div style="margin-top: 20px">
            <h5>Email:</h5>
            <input class="w-100" required="required" type="email" name="email" placeholder="example@domain.com" value="<?= $email  ?>">
        </div>
        <div style="margin-top: 20px">

            <h5>Gender:</h5>
            <select required="required" class="w-100" name="gender">
                <option <?= $gender == "male" ? 'selected="selected"' : "" ?> value="male">Male</option>
                <option <?= $gender == "female" ? 'selected="selected"' : "" ?> value="female">Female</option>
                <option <?= $gender == "other" ? 'selected="selected"' : "" ?> value="other">Other</option>
            </select>

        </div>
        <div style="margin-top: 20px">
            <div style="margin-top: 20px">
                <h5>Phone:</h5>
                <input required="required" id="input-phone" class="w-100" type="text" name="phone" placeholder="+1(xxx)xxx-xxx" value="<?= $phone  ?>">
            </div>
        </div>
        <div class="tx-center" style="margin-top: 20px">
            <button type="submit" name="submit" class="button button-main">Save changes</button>
        </div>
    </form>
</div>

<!-- <div style="margin-top: 20px" class="grid-gap-1 grid-layout-2-1">
    <div class="box-cont-1 p-40 cont-profile">
        <div class="tx-center">
            <div style="margin-top: 10px">
                <i class="profile-logo fa-solid fa-user-graduate"></i>
            </div>
            <div style="margin-top: 15px">
                <span style="color: gray">teacher</span>
            </div>


        </div>
        <hr style="margin-top: 20px">
        <form action="#" method="post">
            <div style="margin-top: 20px">
                <b>Username:</b>
                <input type="text" name="username" placeholder="Username" value="user123456">
            </div>
            <div style="margin-top: 20px">
                <b>Email:</b>
                <input type="email" name="email" placeholder="example@domain.com" value="fafa@gmail.com">
            </div>
            <div style="margin-top: 20px">

                <b>Gender:</b>
                <select name="gender">
                    <option value="male">Male</option>
                </select>

            </div>
            <div style="margin-top: 20px">
                <div style="margin-top: 20px">
                    <b>Phone:</b>
                    <input type="number" name="phone" placeholder="+1(xxx)xxx-xxx" value="98989898">
                </div>
            </div>
            <div style="margin-top: 20px">
                <button type="submit" name="submit" class="button button-main">Save changes</button>
            </div>
        </form>
    </div>
    <div class="box-cont-1 cont-profile">
        <div>
            <img src="https://g2z7g2s8.rocketcdn.me/wp-content/uploads/2020/09/hacer-Classroom-3-1024x732.jpg" alt="image" style="width: 100%" />
        </div>
        <div class="p-40">
            <div class="tx-center">
                <span>My course:</span>
                <a class="profile-data" id="title">
                    <h3>Basics of Java <i class="fa-solid fa-pen"></i></h3>
                </a>
            </div>
            <div>
                <div style="margin-top: 15px">
                    <a class="profile-data" id="occupancy"><b>Occupancy:</b>
                        <i class="fa-solid fa-pen"></i></a>
                </div>
                <span>1/10</span>
            </div>
            <div>
                <div style="margin-top: 15px">
                    <a class="profile-data" id="description">
                        <b>Description</b>
                        <i class="fa-solid fa-pen"></i>
                    </a>
                </div>
                <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam animi amet velit ab rem? Fugiat aliquam laboriosam amet dolorum accusantium accusamus rem, ipsum aliquid quod quis! Velit necessitatibus incidunt qui.</span>
            </div>
        </div>
    </div>
</div> -->