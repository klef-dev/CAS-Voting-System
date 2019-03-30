<template id="cat_type">
  <div class="colorlib-work">
    <div class="colorlib-narrow-content">
      <div class="row">
        <div
          class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box"
          data-animate-effect="fadeInLeft"
        >
          <span class="heading-meta">Categories</span>
          <h2 class="colorlib-heading">{{ category }}</h2>
        </div>
      </div>
      <div class="row row-bottom-padded-md">
      <img src="../images/loader.gif" width="500" style="display: none" id="show_loader"/>
        <div
          class="col-md-3 animate-box"
          data-animate-effect="fadeInLeft"
          v-for="nominees in nominees"
          :key="nominees.id"
        >
          <div class="project" :style="nominees.img" @dblclick="Vote(nominees.personId, nominees.person)">
            <div class="desc">
              <div class="con">
                <h3>
                  <a>{{ nominees.person }}</a>
                </h3>
                <span>{{ type.toUpperCase() }}</span>
                <p class="icon">
                  <span
                    ><span
                      style="cursor: pointer"
                      @click="Vote(nominees.personId, nominees.person)"
                      ><i class="icon-heart"></i> {{ nominees.likes }}</span
                    ></span
                  >
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
          <a href="#" class="btn btn-primary" @click="goBack">Back</a>
        </div>
      </div>
    </div>
  </div>
</template>
