<template>
  <main class="h-100 d-flex align-items-center">
    <div class="container">
      <div class="row align-items-center">
        <div v-if="link" class="card mx-auto w-75">
          <div class="card-body">
            <div class="d-flex">
              <h5 class="card-title">Link Details</h5>
              <h6 class="card-subtitle text-muted ml-auto mt-1">
                <span class="badge badge-secondary mr-2">{{link.redirects}}</span>
                <span>Redirected User</span>
                <i class="ml-2 fa fa-user"></i>
              </h6>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="font-weight-bold">Url</div>
                <div>{{link.path}}</div>
              </div>
              <div class="col-md-6">
                <div class="font-weight-bold">Link</div>
                <router-link :to="{name: 'Redirect', params:{code: link.code}}">{{domain}}/{{link.code}}</router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
<script type="text/javascript">
  export default {
    name: 'Detail',
    data(){
      return  {
        loading: true,
        link: false
      }
    },
    computed: {
      domain() {
        return window.location.origin;
      }
    },
    methods:{
    },
    mounted(){
      var code = this.$route.params.code;
      axios.get('/api/links/'+code).then((response) => {
        this.link = response.data.link
      });
    }
  }
</script>