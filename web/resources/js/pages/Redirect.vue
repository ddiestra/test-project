<template>
  <main class="h-100 d-flex align-items-center">
    <div class="container">
      <div class="row align-items-center">
        <div v-if="error" class="alert alert-danger w-100 text-center">
          <i class="mx-2 fa fa-info-circle"></i> We couldn´t find your link
        </div>
        <div v-else="link" class="alert alert-info w-100 text-center">
          <i class="mx-2 fa fa-spin fa-spinner"></i> We are redirecting you to your final destination <i class="mx-2 fa fa-rocket"></i>
        </div>
      </div>
    </div>
  </main>
</template>
<script type="text/javascript">
  export default {
    name: 'Redirect',
    data(){
      return  {
        link: false,
        error: false,
      }
    },
    methods:{
    },
    mounted(){
      var code = this.$route.params.code;
      axios.get('/api/links/'+code).then((response) => {
        this.link = response.data.link
        if (this.link) {
          axios.put('/api/links/'+code, this.link).then(() => {
            window.location = this.link.path;  
          })
        } else {
          this.error = true;
        }
      });
    }
  }
</script>