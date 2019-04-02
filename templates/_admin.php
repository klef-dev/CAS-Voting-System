<template id="add_nominees">
  <div class="colorlib-contact" v-if="user_id === null">
    <div class="colorlib-narrow-content">
      <div class="row">
        <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
          <span class="heading-meta">Authentication</span>
          <h2 class="colorlib-heading">Admin Login</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div
            class="colorlib-feature colorlib-feature-sm animate-box"
            data-animate-effect="fadeInLeft"
          >
            <div class="colorlib-icon">
              <i class="icon-like"></i>
            </div>
            <div class="colorlib-text">
              <p>Only accessable to Admins</p>
            </div>
          </div>

          <div
            class="colorlib-feature colorlib-feature-sm animate-box"
            data-animate-effect="fadeInLeft"
          >
            <div class="colorlib-icon">
              <i class="icon-data"></i>
            </div>
            <div class="colorlib-text">
              <p>Out of bound to non-admin staff</p>
            </div>
          </div>

          <div
            class="colorlib-feature colorlib-feature-sm animate-box"
            data-animate-effect="fadeInLeft"
          >
            <div class="colorlib-icon">
              <i class="icon-lock3"></i>
            </div>
            <div class="colorlib-text">
              <p>
                Don't just try to hack this site... You are just decieving
                yourself...
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-md-push-1">
          <div class="row">
            <div
              class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box"
              data-animate-effect="fadeInLeft"
            >
              <form method="POST">
                <div class="form-group">
                  <input
                    v-model="username"
                    autofocus="autofocus"
                    required="required"
                    minlength="4"
                    maxlength="12"
                    type="text"
                    class="form-control"
                    placeholder="Enter username"
                    :disabled="disabled"
                  />
                </div>
                <div class="form-group">
                  <input
                    v-model="password"
                    type="password"
                    required="required"
                    class="form-control"
                    placeholder="Password"
                    :disabled="disabled"
                  />
                </div>
                <div class="form-group">
                  <button
                    @click="Auth"
                    class="btn btn-primary btn-send-message"
                    v-html="login"
                    :disabled="disabled"
                  ></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div v-else>
    <div class="colorlib-narrow-content">
      <div class="row">
        <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
          <span class="heading-meta">Nominees</span>
          <h2 class="colorlib-heading">Add Nominees</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div
            class="colorlib-feature colorlib-feature-sm animate-box"
            data-animate-effect="fadeInLeft"
          >
            <div class="colorlib-icon">
              <i class="icon-like"></i>
            </div>
            <div class="colorlib-text">
              <p>Only accessable to Admins</p>
            </div>
          </div>

          <div
            class="colorlib-feature colorlib-feature-sm animate-box"
            data-animate-effect="fadeInLeft"
          >
            <div class="colorlib-icon">
              <i class="icon-data"></i>
            </div>
            <div class="colorlib-text">
              <p>Out of bound to non-admin staff</p>
            </div>
          </div>

          <div
            class="colorlib-feature colorlib-feature-sm animate-box"
            data-animate-effect="fadeInLeft"
          >
            <div class="colorlib-icon">
              <i class="icon-lock3"></i>
            </div>
            <div class="colorlib-text">
              <p>
                Don't just try to hack this site... You are just decieving
                yourself...
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-md-push-1">
          <div class="row">
            <div
              class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box"
              data-animate-effect="fadeInLeft"
            >
              <form method="POST">
                <div class="form-group">
                  <input
                    v-model="reg_no"
                    autofocus="autofocus"
                    required="required"
                    minlength="6"
                    maxlength="7"
                    type="text"
                    class="form-control"
                    placeholder="Reg No: 1700172"
                    :disabled="disabled"
                  />
                </div>
                <div class="form-group">
                  <input
                    v-model="name"
                    required="required"
                    minlength="4"
                    maxlength="65"
                    type="text"
                    class="form-control"
                    placeholder="Enter Name"
                    :disabled="disabled"
                  />
                </div>
                <div class="form-group">
                  <select v-model="category" class="form-control" :disabled="disabled">
                    <option value="">Select Category</option>
                    <option value="FRESHMAN">FRESHMAN OF THE YEAR</option>
                    <option value="focas">FACE OF CAS</option>
                    <option value="sociable">MOST SOCIABLE</option>
                    <option value="enterpreneur"
                      >ENTREPRENEUR OF THE YEAR</option
                    >
                    <option value="fashionable">MOST FASHIONABLE</option>
                    <option value="fypersonality"
                      >FINAL YEAR PERSONALITY</option
                    >
                    <option value="leadership">LEADERSHIP AWARD</option>
                    <option value="sportman">SPORTSMANSHIP AWARD</option>
                  </select>
                  <a @click="personImage" class="btn btn-primary btn-send-message" :disabled="disabled">
                    Pick an Image
                  </a>
                  <span v-if="imageSelected !== null" v-html="imageSelected.name"></span>
                </div>
                <div class="form-group">
                  
                </div>
                <div class="form-group">
                  <button
                    @click="Nominate"
                    class="btn btn-primary btn-send-message"
                    v-html="nominate"
                  ></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  UPLOADCARE_PUBLIC_KEY = 'ccf0fb3bf1e665a4c185';
  UPLOADCARE_TABS = 'file camera url facebook gdrive instagram';
  UPLOADCARE_EFFECTS = 'crop,rotate,mirror,flip,enhance,sharp,blur,grayscale,invert';
  UPLOADCARE_IMAGE_SHRINK = '1024x1024';
  UPLOADCARE_IMAGES_ONLY = true;
  UPLOADCARE_PREVIEW_STEP = true;
  UPLOADCARE_CLEARABLE = true;
</script>
