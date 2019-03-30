const Login = Vue.component("login", {
  template: "#login",
  data() {
    return {
      reg_no: "",
      password: "",
      login: "Login",
      user_id: null
    };
  },
  methods: {
    Login(e) {
      e.preventDefault();
      let reg_no = this.reg_no,
        password = this.password,
        re = /[0-9]/;
      if (reg_no === "" || password === "")
        swal("Warning", "You need to type finish", "warning");
      else if (!re.test(reg_no))
        swal("🤦‍", "You hear reg. no and you inputing text", "error");
      else if (reg_no.length < 7)
        swal("👀", "Your reg. no looks strange", "error");
      else if (password.length < 7)
        swal("Oops", "Password too short to proceed", "error");
      else {
        var login = {
          reg_no: reg_no,
          password: password
        };
        this.login = "Loading...";
        axios
          .post(`${API}/login`, { ...login })
          .then(response => {
            this.password = "";
            this.login = "Login";
            result = response.data;
            if (result.error) swal("🥴", `${result.error.err_text}`, "error");
            else {
              localStorage.setItem("token", result.token);

              this.$router.push("/categories");
            }
          })
          .catch(() => {
            swal({
              title: `No connection to server`,
              icon: "error"
            });
          });
      }
    }
  },
  created() {
    const check = () => {
      let token = localStorage.getItem("token");
      if (token === null) {
        this.user_id = null;
      } else {
        axios
          .get(`${API}/loggedin/${token}`)
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
    check();
    setInterval(() => {
      check();
    }, 2000);
  }
});

const Signup = Vue.component("signup", {
  template: "#signup",
  data() {
    return {
      reg_no: "",
      password: "",
      signup: "Signup"
    };
  },
  methods: {
    Signup(e) {
      e.preventDefault();
      let reg_no = this.reg_no,
        password = this.password,
        re = /[0-9]/;
      if (reg_no === "" || password === "")
        swal({
          title: "You need to finish typing",
          icon: "warning"
        });
      else if (!re.test(reg_no))
        swal({
          title: "You hear reg. no and you inputing text🤦‍♂️",
          icon: "error"
        });
      else if (reg_no.length < 7)
        swal({
          title: "You are not student of LMU",
          icon: "error"
        });
      else if (password.length < 7)
        swal({
          title: "Password too short to proceed",
          icon: "error"
        });
      else {
        var signup = {
          reg_no: reg_no,
          password: password
        };
        this.signup = "Signing Up...";
        axios
          .post(`${API}/signup`, { ...signup })
          .then(response => {
            result = response.data;
            this.signup = "Signup";
            this.password = "";
            if (result.error)
              swal({
                title: `${result.error.err_text}`,
                icon: "error"
              });
            else {
              swal("👌👌", `${result.success.success_text}`, "success");
              this.reg_no = "";
            }
          })
          .catch(() => {
            swal({
              title: `No connection to server`,
              icon: "error"
            });
          });
      }
    }
  }
});
