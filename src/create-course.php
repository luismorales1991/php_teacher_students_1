<?php
include("./layout/header.php");
?>
<?php
include("./layout/navbar-1.php");
?>

<main>
    <form style="margin-top: 20px" class="m-container a-dk form-2" method="post">
        <div class="form-content">
            <h1 class="a-dk form-title">Create Course</h1>
            <div class="form-element">
                <h5 class="a-dk">Title</h5>
                <input placeholder="Title" class="a-dk form-input-text" type="text" />
            </div>
            <div class="form-element">
                <h5 class="a-dk">Course</h5>
                <select class="a-dk form-input-text">
                    <option>Math</option>
                    <option>Science</option>
                    <option>Foreign Language</option>
                    <option>Technology</option>
                </select>
            </div>
            <div class="form-element">
                <h5 class="a-dk">Space</h5>
                <input placeholder="1-30" size="2" maxlength="2" class="a-dk" type="text" />
            </div>
            <div class="form-element">
                <h5 class="a-dk">Description</h5>
                <textarea placeholder="Description" class="a-dk form-input-text" rows="10"></textarea>
            </div>
        </div>
        <div class="form-element select-image-cr-cu-container">
            <h4 style="margin-bottom: 20px" class="a-dk">Select Banner</h4>
            <div class="select-image-cr-cu-div">
                <label for="image-1">
                    <div class="select-image-cr-cu">
                    </div>
                    <input class="select-image-cr-cu-input" type="radio" name="image" id="image-1" />
                </label>
                <label for="image-2">
                    <div class="select-image-cr-cu">
                    </div>
                    <input class="select-image-cr-cu-input" type="radio" name="image" id="image-2" />
                </label>
                <label for="image-3">
                    <div class="select-image-cr-cu">
                    </div>
                    <input class="select-image-cr-cu-input" type="radio" name="image" id="image-3" />
                </label>
                <label for="image-4">
                    <div class="select-image-cr-cu">
                    </div>
                    <input class="select-image-cr-cu-input" type="radio" name="image" id="image-4" />
                </label>
                <label for="image-5">
                    <div class="select-image-cr-cu">
                    </div>
                    <input class="select-image-cr-cu-input" type="radio" name="image" id="image-5" />
                </label>
                <label for="image-6">
                    <div class="select-image-cr-cu">
                    </div>
                    <input class="select-image-cr-cu-input" type="radio" name="image" id="image-6" />
                </label>
                <label for="image-7">
                    <div class="select-image-cr-cu">
                    </div>
                    <input class="select-image-cr-cu-input" type="radio" name="image" id="image-7" />
                </label>
            </div>
        </div>
        <div class="form-content">
            <div class="form-element submit-login-container">
                <input class="button button-main" type="submit" value="Create Course">
                <a class="submit-login-forget" style="margin-left: 10px;" href="#">Skip for now</a>
            </div>
        </div>
    </form>
</main>

<script src="js/navbar-1.js"></script>
</body>

</html>