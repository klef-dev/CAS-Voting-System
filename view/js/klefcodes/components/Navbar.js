const Navbar = Vue.component("navbar", {
  template: "#navbar",
  data() {
    return {};
  },
  props: ["user_id", "admin", "username"],
  methods: {
    Logout(e) {
      e.preventDefault();
      let token = localStorage.getItem("token");
      axios
        .post(`${API}/logout`, { token: token })
        .then(() => {
          localStorage.clear();
          this.user_id = null;
        })
        .catch(() => {
          localStorage.clear();
          this.user_id = null;
        });
    }
  }
});
