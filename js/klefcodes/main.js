const routes = [
  { path: "/", component: Home },
  { path: "*", component: NotFound },
  { path: "/login", component: Login },
  { path: "/nominate", component: AddNominees },
  { path: "/signup", component: Signup },
  { path: "/categories", component: Categories },
  { path: "/categories/:type", component: catType, props: true }
];

const router = new VueRouter({
  routes,
  // mode: "history"
});

new Vue({
  router,
  data() {
    return {
      user_id: null,
      admin: null,
      username: ""
    };
  },
  created() {
    const checkToken = () => {
      let token = localStorage.getItem("token");
      if (token === null) {
        this.user_id = null;
      } else {
        instance.get(`/loggedin/${token}`)
          .then(res => {
            var data = res.data;
            if (data.error) {
              this.user_id = null;
            } else {
              this.user_id = data[0].user_id;
            }
          })
          .catch(() => {
            this.user_id = null;
          });
      }
    };
    const checkAdminToken = () => {
      var adminToken = localStorage.getItem("adminToken");
      if (adminToken === null) {
        this.admin = null;
      } else {
        instance.get(`/loggedin/${adminToken}`)
          .then(res => {
            var data = res.data;
            if (data.error) {
              this.admin = null;
            } else {
              this.admin = data[0].user_id;
              instance.get(`/user/${this.admin}`)
                .then(res => {
                  var data = res.data;
                  if (data.error) {
                    this.admin = null;
                  } else {
                    this.username = data[0].username;
                  }
                })
                .catch(() => {
                  this.admin = null;
                });
            }
          })
          .catch(() => {
            this.user_id = null;
          });
      }
    }
    if (localStorage.getItem("adminToken")) {
      checkAdminToken();
    } else {
      checkToken();
    }
  }
}).$mount("#cas__app");
