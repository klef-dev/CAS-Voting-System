const AddNominees = Vue.component("add_nominees", {
  template: "#add_nominees",
  data() {
    return {
      user_id: null,
      admin: 0,
      username: "",
      password: "",
      login: "Login",
      reg_no: "",
      name: "",
      category: "",
      nominate: "Nominate",
      imageSelected: null,
      disabled: false,
    };
  },
  methods: {
    personImage(event) {
      event.preventDefault();
      UPLOADCARE_PUBLIC_KEY = 'ccf0fb3bf1e665a4c185';
      UPLOADCARE_TABS = 'file camera url facebook gdrive instagram';
      uploadcare.registerTab("preview", uploadcareTabEffects);
      UPLOADCARE_EFFECTS = ["blur", "sharp", "grayscale", "crop"]; 
      UPLOADCARE_CLEARABLE = true;
      UPLOADCARE_IMAGE_SHRINK = "1024x1024";
      UPLOADCARE_IMAGES_ONLY = true;
      UPLOADCARE_PREVIEW_STEP = true;
      uploadcare
        .openDialog(null, {
          previewStep: true,
          imagesOnly: true
        })
        .done(function(file) {
          file.promise().done(function(fileInfo) {
            var img = fileInfo.cdnUrl;
            localStorage.setItem("personImage", img)
          });
        });
    },
    Auth(e) {
      e.preventDefault();
      let username = this.username,
        password = this.password;
      if (username === "" || password === "")
        swal("Warning", "All the fields are required", "warning");
      else if (username.length < 3)
        swal("👀", "Your username is short", "error");
      else if (password.length < 7)
        swal("Oops", "Password too short to proceed", "error");
      else {
        var login = {
          username: username,
          password: password
        };
        this.login = "Loading...";
        this.disabled = true;
        axios
          .post(`${API}/login_admin`, { ...login })
          .then(response => {
            this.password = "";
            this.login = "Login";
            this.disabled = false;
            result = response.data;
            if (result.error)
              swal("Unauthorized access", `${result.error.err_text}`, "error");
            else {
              localStorage.setItem("adminToken", result.token);
              this.disabled = true;
              this.login = "Loading...";
              axios
                .get(`${API}/loggedin/${result.token}`)
                .then(res => {
                  this.disabled = false;
                  this.login = "Login";
                  var data = res.data;
                  if (data.error) {
                    this.user_id = null;
                  } else {
                    this.user_id = data[0].user_id;
                  }
                })
                .catch(() => {
                  this.disabled = false;
                  this.login = "Login";
                  this.user_id = null;
                });
            }
          })
          .catch(() => {
            this.login = "Login";
            this.disabled = false;
            swal({
              title: `No connection to server`,
              icon: "error"
            });
          });
      }
    },
    Nominate(e) {
      e.preventDefault();
      let name = this.name,
        reg_no = this.reg_no,
        category = this.category,
        re = /[0-9]/;
      if (name === "" || reg_no === "" || category === "") {
        swal("Warning", "You need to finish before submitting", "warning");
      } else if (!re.test(reg_no)) {
        swal("🤪", "Woah!!! don't input text for reg. no", "error");
      } else if (reg_no.length < 7) {
        swal("👀", name + "'s reg. no looks strange", "error");
      } else if (name < 3) {
        swal("Oops", "Name too short to proceed", "error");
      } else {
        this.imageSelected =  localStorage.getItem("personImage");
        var add = {
          person: name,
          reg_no: reg_no,
          category: category,
          personImage: this.imageSelected
        };
        this.disabled = true;
        this.nominate = "Nominating...";
        axios
          .post(`${API}/add`, { ...add })
          .then(res => {
            this.disabled = false;
            this.nominate = "Nominate";
            result = res.data;
            if (result.success) {
              swal("👌👌", `${result.success.success_text}`, "success");
              this.reg_no = "";
              this.name = "";
              this.category = "";
              this.imageSelected = "";
            } else {
              this.disabled = false;
              this.nominate = "Nominate";
              swal({
                title: `Coudn't nominate ${name}`,
                icon: "error"
              });
            }
          })
          .catch(() => {
            this.disabled = false;
            this.nominate = "Nominate";
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
      let token = localStorage.getItem("adminToken");
      if (token === null) {
        this.user_id = null;
      } else {
        axios
          .get(`${API}/loggedin/${token}`)
          .then(res => {
            var data = res.data;
            if (data.error) {
              this.user_id = null;
              this.$router.push("/");
            } else {
              this.user_id = data[0].user_id;
            }
          })
          .catch(() => {
            this.$router.push("/");
          });
      }
    };
    check();
    setInterval(() => {
      check();
    }, 3000);
  }
});
