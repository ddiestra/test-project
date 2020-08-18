<template>
  <main class="h-100 d-flex align-items-center">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 text-center">
          <h1>Take control over your links</h1>
          <p class="text-muted">By clicking SHORTEN, you are agreeing to this App’s Terms of Service and Privacy Policy</p>
          <form @submit.prevent="create">
            <div class="row">
              <div class="col-md-8 mb-2">
                <input type="text" v-model="form.path" placeholder="Enter URL to be shortened" class="form-control" required="" :readonly="loading">
              </div>
              <div class="col-md-4">
                <button v-if="loading" class="btn btn-block btn-primary font-weight-600" type="button" disabled="">
                  <i class="fa fa-spin fa-spinner"></i>
                </button>
                <button v-else class="btn btn-block btn-primary font-weight-600" type="submit">Shorten</button>
              </div>
            </div>
          </form>
          <ul class="list-group">
            <li v-for="l in links" class="list-group-item d-flex">
              <div class="p-1">{{l.path}}</div>
              <div class="ml-3 mt-1">
                <router-link :to="{name: 'Detail', params:{code: l.code}}" class="badge badge-success" target="_blank">
                  <i class="fa fa-eye"></i>
                </router-link>
              </div>
              <router-link :to="l.code" class="ml-auto mr-3 p-1" target="_blank">{{domain}}/{{l.code}}</router-link>
              <a href="#" @click.prevent="copy(l)" class="btn btn-sm btn-outline-primary">Copy</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </main>
</template>
<script type="text/javascript">
  export default {
    name: 'Home',
    data(){
      return  {
        loading: false,
        form: {
          path: ''
        },
        links:[]
      }
    },
    computed: {
      domain() {
        return window.location.origin;
      }
    },
    methods:{
      copy(link) {
        const $elem = $('<textarea></textarea>');
        $elem.val(`${this.domain}/${link.code}`);
        $('body').append($elem);
        $elem[0].select();
        document.execCommand('copy');
        $elem.remove();
        toastr.success('copied!');
      },
      create() {
        this.loading = true;
        axios.post('/api/links', this.form).then((response) =>{
          this.loading = false;
          this.form.path = '';
          this.links.unshift(response.data.link);
        });
      }
    },
    mounted(){
      
    }
  }
</script>