<div class="signin col-11 col-md-9 col-lg-7 col-xl-5 mx-auto border p-4 bg-light mt-4">
    <form action="/user/login/" method="post">
        <h2 class="text-success">Login</h2>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="text" class="form-control" name="pass" id="pass" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>

     
        <?php

        if (isset($params['message_view'])) {
            echo "<div class='alert alert-success mt-y' role='alert'>";
            echo $params['message_view'];
            echo "</div>";
            unset($params);
        }

        ?>
        <button type="submit" class="btn btn-primary">Submit</button>
        <div class="mb-3">
            <label for="username" class="form-label">
                <a href="/user/register/">Registra't</a>
            </label>
        </div>

        <div class="mb-3">
            <label for="pass" class="form-label">No estas registrat?   </label>

            <a class="btn btn-outline-secondary btn-google   btn-outline" href="/user/callAuthgoogle"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Signup Using Google</a>

        </div>


    </form>
</div>