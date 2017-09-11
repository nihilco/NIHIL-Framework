<template>
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- @if(!Auth::guest()) -->
        <div class="card-header">
          Feel free to leave a reply
        </div>
        <div class="card-block">
          <!--<form method="POST" action="">-->
            <div class="form-group">
              <textarea class="form-control"
	                id="content"
			name="content"
			title="content"
			placeholder="Have something to say?"
			rows="5"
			v-model="body"
			required></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-lg btn-primary pull-right" @click="addReply">Reply</button>
            </div>
          <!--</form>-->
          <!--@else
          <div class="card-block">
            Please <a href="{{ route('login') }}">login</a> to participate in this discussion.
          @endif -->    
        </div>

      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        body: '',
        endpoint: '/threads/'
      }
    },

    methods: {
      addReply() {
        axios.post(this.endpoint, { content: this.body })
	.then(({data}) => {
	  this.body = '';

          flash('Created Reply', 'You added a reply with Vue.');

          this.$emit('created', data);
	});
      }
    }
  }
</script>