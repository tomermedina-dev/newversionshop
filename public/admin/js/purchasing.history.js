new Vue({
  el : "#nv-po-list" ,
  data : {
    poList : []
  } ,
  methods : {
    loadPO : function () {
      const t = this;
      axios.get('/admin/purchasing/list').
      then(function(response) {
        t.poList = response.data;
      })
    } ,
    pad : function (val) {
      return pad(val , 10);
    }
  } ,
  mounted(){
    this.loadPO();
  }
});
