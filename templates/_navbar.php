<template id="navbar">
  <div>
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
      <aside
        id="colorlib-aside"
        role="complementary"
        class="border js-fullheight"
      >
        <h1 id="colorlib-logo">
          <a href="./"
            ><img src="./images/logo.png" alt="" width="100"
          /></a>
        </h1>
        <nav id="colorlib-main-menu" role="navigation" v-if="user_id === null && admin === null">
          <ul>
            <li class=""><router-link to="/">Home</router-link></li>
            <li><router-link to="/categories">Categories</router-link></li>
            <li><router-link to="/signup">Signup</router-link></li>
            <li><router-link to="/login">Login</router-link></li>
          </ul>
        </nav>
        <nav id="colorlib-main-menu" role="navigation" v-else-if="admin !== null">
          <ul>
            <li class=""><router-link to="/">Hello, {{username}}</router-link></li>
            <li><router-link to="/categories">Categories</router-link></li>
            <li><router-link to="/nominate">Nominate</router-link></li>
            <li><a href="!#" @click="Logout">Logout</a></li>
          </ul>
        </nav>
        <nav id="colorlib-main-menu" role="navigation" v-else>
          <ul>
            <li class=""><router-link to="/">Home</router-link></li>
            <li><router-link to="/categories">Categories</router-link></li>
            <li><a href="!#" @click="Logout">Logout</a></li>
          </ul>
        </nav>
        

        <div class="colorlib-footer">
          <p>
            <small
              >&copy; Copyright
              <span id="date"></span>
              CAS Official Voting Site <br />
              All rights reserved
            </small>
          </p>
          <ul>
            <li>
              <a href="http://github.com/klefcodes" target="_blank"
                ><i class="icon-github"></i
              ></a>
            </li>
            <li>
              <a href="http://instagram.com/klefcodes" target="_blank"
                ><i class="icon-instagram"></i
              ></a>
            </li>
            <li>
              <a href="http://twitter.com/klefcodes" target="_blank"
                ><i class="icon-twitter2"></i
              ></a>
            </li>
            <li>
              <a href="http://facebook.com/klefcodes" target="_blank"
                ><i class="icon-facebook2"></i
              ></a>
            </li>
          </ul>
        </div>
      </aside>
  </div>
</template>