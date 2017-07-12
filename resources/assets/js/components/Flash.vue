<template>
  <div class="card card-inverse card-success alert-flash" v-show="show">
    <div class="card-header">
      <strong>Succes! </strong>{{ header }}
    </div>
    <div class="card-block">
      {{ body }}
    </div>
  </div>
</template>

<script>
    export default {
      props: ['title', 'message'],
      data() {
        return {
	  header: '',
	  body: '',
	  show: false
        }
      },

      created() {
        if(this.title && this.message) {
	  this.flash(this.title, this.message);
        }

	window.events.$on('flash', (title, message) => {
	  this.flash(title, message);
	});
      },

      methods: {
        flash(title, message) {
	  this.header = title;
	  this.body = message;
	  this.show = true;

	  this.hide();
        },
        hide() {
  	  setTimeout(() => {
  	    this.show = false;
	  }, 3000);	
        }
      }
    }
</script>

<style>
.alert-flash {
  position: fixed;
  bottom: 25px;
  right: 25px;
  width: 250px;
  z-index:1200;
  margin-bottom:0;
}
</style>