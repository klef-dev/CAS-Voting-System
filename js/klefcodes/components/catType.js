const catType = Vue.component("cat_type", {
  template: "#cat_type",
  data() {
    return {
      nominees: [],
      user_id: null,
      category: ""
    };
  },
  methods: {
    goBack() {
      window.history.length > 1 ? this.$router.go(-1) : this.$router.push("/");
    },
    Vote(personId, person) {
      if (this.user_id === null || this.admin === null) {
        swal(
          "Sorry",
          "You just need to login or You can't vote as an admin",
          "error"
        );
      } else {
        var vote = {
          person: person,
          personId: personId,
          user_id: this.user_id,
          type: this.type
        };
        axios
          .post(`${API}/vote`, { ...vote })
          .then(res => {
            result = res.data;
            if (result.error) {
              swal("🙄", `${result.error.err_text}`, "error");
            } else {
              swal("👌👌", `${result.success.success_text}`, "success");
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
  props: ["type"],
  created() {
    switch (this.type) {
      case "freshman":
        this.category = "FRESHMAN OF THE YEAR";
        break;
      case "focas":
        this.category = "FACE OF CAS";
        break;
      case "sociable":
        this.category = "MOST SOCIABLE";
        break;
      case "enterpreneur":
        this.category = "ENTREPRENEUR OF THE YEAR";
        break;
      case "fashionable":
        this.category = "MOST FASHIONABLE";
        break;
      case "fypersonality":
        this.category = "FINAL YEAR PERSONALITY";
        break;
      case "leadership":
        this.category = "LEADERSHIP AWARD";
        break;
      case "sportman":
        this.category = "SPORTSMANSHIP AWARD";
        break;
      default:
        this.category = "";
        break;
    }
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
            // swal({
            //   title: `No connection to server`,
            //   icon: "error"
            // });
          });
      }
    };
    check();
    setInterval(() => {
      check();
    }, 1000);

    const getCat = () => {
      $(() => {
        $("#show_loader").show();
      });
      axios
        .get(`${API}/cat/${this.type}`)
        .then(res => {
          $(() => {
            $("#show_loader").hide();
          });
          result = res.data;
          if (result === "") {
            console.error("Nominees not found");
          } else {
            this.nominees = [];
            result.map(nominees => {
              this.nominees.push({
                id: nominees.id,
                likes: nominees.likes,
                person: nominees.person,
                personId: nominees.personId,
                reg_no: nominees.reg_no,
                img: `background-image: url(${nominees.personImage});`
              });
            });
          }
        })
        .catch(() => {
          swal({
            title: `No connection to server`,
            icon: "error"
          });
        });
    };
    getCat();

    // GET NEW UPDATE EVERY 10SECS
    setInterval(() => {
      axios
        .get(`${API}/cat/${this.type}`)
        .then(res => {
          result = res.data;
          if (result === "") {
            console.error("Nominees not found");
          } else {
            this.nominees = [];
            result.map(nominees => {
              this.nominees.push({
                id: nominees.id,
                likes: nominees.likes,
                person: nominees.person,
                personId: nominees.personId,
                reg_no: nominees.reg_no,
                img: `background-image: url(${nominees.personImage});`
              });
            });
          }
        })
        .catch(() => {
          // swal({
          //   title: `No connection to server`,
          //   icon: "error"
          // });
          console.log("No connection to server");
        });
    }, 10000);
  }
});
