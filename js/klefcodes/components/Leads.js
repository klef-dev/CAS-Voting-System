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
      instance.get(`/leads/freshman`)
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
      instance.get(`/leads/focas`)
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
      instance.get(`/leads/sociable`)
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
      instance.get(`/leads/enterpreneur`)
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
      instance.get(`/leads/fashionable`)
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
      instance.get(`/leads/fypersonality`)
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
      instance.get(`/leads/leadership`)
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
      instance.get(`/leads/sportman`)
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
