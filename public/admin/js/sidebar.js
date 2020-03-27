var sidebarFunc = new Vue({
  el : "#nv-sidebar" ,
  methods :{
    loadAdminPage : function(pageName){
      $('.nv-spinner').css('display' , 'block');
      axios.get("/admin/page/"+pageName).then(
        response =>{

          $('#main-container').empty();
          $('#main-container').append(response.data);
          $('.nv-spinner').css('display' , 'none');
        }).catch(error => {
          swalWentWrong();
      });
    }
  }
});

sidebarFunc.loadAdminPage('dashboard');
