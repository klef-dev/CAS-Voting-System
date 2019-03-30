const Home = Vue.component("home", {
  template: "#home",
  data() {
    return {
      title: "College of Agricultural Science"
    };
  },
  created() {}
});

const NotFound = Vue.component("not_found", {
  template: "#not_found",
  data() {
    return {
      title: "Not Found"
    };
  },
  created() {}
});
