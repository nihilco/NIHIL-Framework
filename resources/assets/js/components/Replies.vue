<template>
  <div>
    <div v-for="reply in items">
      <reply :data="reply" @deleted="remove(index)"></reply>
    </div>

    <new-reply @created="add(reply)"></new-reply>
  </div>
</template>

<script>
  import Reply from './Reply.vue';
  import NewReply from './NewReply.vue';

  export default {
    props: ['data'],

    components: { Reply, NewReply },

    data() {
      return {
        items: this.data
      }
    },

    methods: {
      add(reply) {
        this.items.push(reply);
      },

      remove(index) {
        this.items.splice(index, 1);

        this.$emit('deleted');

        flash('Reply Deleted', 'You reply was deleted by Vue.');
      }

    }
  }
</script>