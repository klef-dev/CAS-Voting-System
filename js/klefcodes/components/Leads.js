const Leads = Vue.component("leads", {
  template: "#leads",
  data() {
    return {
      leads: []
    };
  },
  created() {
    const getLeads = () => {
      // FRESHMAN
      axios
        .get(`${API}/leads/freshman`)
        .then(response => {
          leads = response.data;
          leads.map(leads => {
            this.leads.push({
              id: leads.id,
              personId: leads.personId,
              reg_no: leads.reg_no,
              person: leads.person,
              category: leads.category,
              likes: leads.likes,
              img: `background-image: url(${leads.personImage});`,
              link: '/categories/'+leads.category
            });
          });
        })
        .catch(() => {
          return;
        });

      // FACE OF CAS
      axios
        .get(`${API}/leads/focas`)
        .then(response => {
          leads = response.data;
          leads.map(leads => {
            this.leads.push({
              id: leads.id,
              personId: leads.personId,
              reg_no: leads.reg_no,
              person: leads.person,
              category: leads.category,
              likes: leads.likes,
              img: `background-image: url(${leads.personImage});`,
              link: '/categories/' + leads.category
            });
          });
        })
        .catch(() => {
          return;
        });

      // SOCIABLE
      axios
        .get(`${API}/leads/sociable`)
        .then(response => {
          leads = response.data;
          leads.map(leads => {
            this.leads.push({
              id: leads.id,
              personId: leads.personId,
              reg_no: leads.reg_no,
              person: leads.person,
              category: leads.category,
              likes: leads.likes,
              img: `background-image: url(${leads.personImage});`,
              link: '/categories/' + leads.category
            });
          });
        })
        .catch(() => {
          return;
        });

      // ENTERPRENEUR
      axios
        .get(`${API}/leads/enterpreneur`)
        .then(response => {
          leads = response.data;
          leads.map(leads => {
            this.leads.push({
              id: leads.id,
              personId: leads.personId,
              reg_no: leads.reg_no,
              person: leads.person,
              category: leads.category,
              likes: leads.likes,
              img: `background-image: url(${leads.personImage});`,
              link: '/categories/' + leads.category
            });
          });
        })
        .catch(() => {
          return;
        });

      // FASHIONABLE
      axios
        .get(`${API}/leads/fashionable`)
        .then(response => {
          leads = response.data;
          leads.map(leads => {
            this.leads.push({
              id: leads.id,
              personId: leads.personId,
              reg_no: leads.reg_no,
              person: leads.person,
              category: leads.category,
              likes: leads.likes,
              img: `background-image: url(${leads.personImage});`,
              link: '/categories/' + leads.category
            });
          });
        })
        .catch(() => {
          return;
        });

      // FINAL YEAR PERSONALITY
      axios
        .get(`${API}/leads/fypersonality`)
        .then(response => {
          leads = response.data;
          leads.map(leads => {
            this.leads.push({
              id: leads.id,
              personId: leads.personId,
              reg_no: leads.reg_no,
              person: leads.person,
              category: leads.category,
              likes: leads.likes,
              img: `background-image: url(${leads.personImage});`,
              link: '/categories/' + leads.category
            });
          });
        })
        .catch(() => {
          return;
        });

      // LEADERSHIP
      axios
        .get(`${API}/leads/leadership`)
        .then(response => {
          leads = response.data;
          leads.map(leads => {
            this.leads.push({
              id: leads.id,
              personId: leads.personId,
              reg_no: leads.reg_no,
              person: leads.person,
              category: leads.category,
              likes: leads.likes,
              img: `background-image: url(${leads.personImage});`,
              link: '/categories/' + leads.category
            });
          });
        })
        .catch(() => {
          return;
        });

      // SPORTMAN
      axios
        .get(`${API}/leads/sportman`)
        .then(response => {
          leads = response.data;
          leads.map(leads => {
            this.leads.push({
              id: leads.id,
              personId: leads.personId,
              reg_no: leads.reg_no,
              person: leads.person,
              category: leads.category,
              likes: leads.likes,
              img: `background-image: url(${leads.personImage});`,
              link: '/categories/' + leads.category
            });
          });
        })
        .catch(() => {
          return;
        });
    };
    getLeads();
  }
});
