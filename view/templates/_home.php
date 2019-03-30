<template id="home">
  <div>
    <aside id="colorlib-hero" class="js-fullheight">
      <div class="flexslider js-fullheight">
        <ul class="slides">
          <li style="background-image: url(./images/002.jpg);">
            <div class="overlay"></div>
            <div class="container-fluid">
              <div class="row">
                <div
                  class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 js-fullheight slider-text"
                >
                  <div class="slider-text-inner">
                    <div class="desc">
                      <h1>{{ title }}</h1>
                      <h2>Official Voting</h2>
                      <h2>2019</h2>
                      <p>
                        <router-link to="/categories" class="btn btn-primary btn-learn"
                          >View Categories <i class="icon-arrow-right3"></i
                        ></router-link>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li style="background-image: url(./images/004.jpg);">
            <div class="overlay"></div>
            <div class="container-fluid">
              <div class="row">
                <div
                  class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 js-fullheight slider-text"
                >
                  <div class="slider-text-inner">
                    <div class="desc">
                      <h1>Vote for Choice</h1>
                      <h2>Signup now or Login</h2>
                      <p>
                        <router-link to="/signup" class="btn btn-primary btn-learn"
                          >Signup <i class="icon-arrow-right3"></i
                        ></router-link>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </aside>

    <!-- Leads -->
    <leads></leads>
  </div>
</template>

<template id="not_found">
  <div>
  <h2 class="colorlib-heading">404 Page not Found</h2>
  </div>
</template>