<?php
include("./layout/header.php");
?>
<?php
include("./layout/navbar-1.php");
?>

<main>
    <form action="./controllers/create-course.php" class="m-container a-dk form-2" method="post">
        <div class="form-content">
            <a class="submit-login-forget text-single-1 a-dk" href="main-menu.php"><i class="fa-solid fa-angle-left"></i> Get Back</a>
            <h1 style="margin-top: 20px" class="to-white a-dk form-title">Create Course</h1>
            <div class="form-element">
                <h5 class="to-white a-dk">Title</h5>
                <button id="generate-0" class="generate-random-data-button a-dk button-main-cty" type="button"># Generate Random</button>
                <input placeholder="Title" class="a-dk form-input-text" type="text" />
            </div>

            <div class="form-element">
                <h5 class="to-white a-dk">Limit</h5>
                <div><button id="generate-1" class="generate-random-data-button a-dk button-main-cty" type="button"># Generate Random</button></div>
                <input placeholder="1-30" size="2" maxlength="2" class="a-dk" type="text" />
            </div>
            <div class="form-element">
                <h5 class="to-white a-dk">Description</h5>
                <button id="generate-2" class="generate-random-data-button a-dk button-main-cty" type="button"># Generate Random</button>
                <textarea placeholder="Description" class="a-dk form-input-text" rows="10"></textarea>
            </div>
        </div>
        <div class="form-element select-image-cr-cu-container">
            <h4 style="margin-bottom: 20px" class="to-white a-dk">Select Banner</h4>
            <div class="select-image-cr-cu-div">
                <label for="image-1">
                    <div class="select-image-cr-cu">
                        <img class="image-select" src="https://g2z7g2s8.rocketcdn.me/wp-content/uploads/2020/09/hacer-Classroom-3-1024x732.jpg" alt="classroom">
                    </div>
                    <input class="select-image-cr-cu-input" type="radio" name="image" id="image-1" />
                </label>
                <label for="image-2">
                    <div class="select-image-cr-cu">
                        <img class="image-select" src="https://img.blogs.es/anexom/wp-content/uploads/2020/12/Google-Classroom-que-es.jpg" alt="image">
                    </div>
                    <input class="select-image-cr-cu-input" type="radio" name="image" id="image-2" />
                </label>
                <label for="image-3">
                    <div class="select-image-cr-cu">
                        <img class="image-select" src="https://eitrawmaterials.eu/wp-content/uploads/2019/05/Label-brochure-1.jpg" alt="image">
                    </div>
                    <input class="select-image-cr-cu-input" type="radio" name="image" id="image-3" />
                </label>
                <label for="image-4">
                    <div class="select-image-cr-cu">
                        <img class="image-select" src="https://cdn.ila-france.com/wp-content/uploads/2015/02/our-students.jpg" alt="image">
                    </div>
                    <input class="select-image-cr-cu-input" type="radio" name="image" id="image-4" />
                </label>
                <label for="image-5">
                    <div class="select-image-cr-cu">
                        <img class="image-select" src="https://www.thoughtco.com/thmb/hQC8gjfZ4Rd421J4i3UeRwr6eZY=/3865x2576/filters:fill(auto,1)/teenage-students-in-classroom--141090063-5a653ed40c1a8200366bdd66.jpg" alt="image">
                    </div>
                    <input class="select-image-cr-cu-input" type="radio" name="image" id="image-5" />
                </label>
            </div>
        </div>
        <div class="form-content">
            <div class="form-element submit-login-container">
                <button name="submit" class="button button-main" type="submit">Create Course</button>
            </div>
        </div>
    </form>
</main>

<script src="js/navbar-1.js"></script>
