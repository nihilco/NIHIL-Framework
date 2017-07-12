<template>
  <div class="input-group">
    <span class="input-group-addon" v-text="votesDown"></span>
    <span class="input-group-btn">
      <button type="submit" name="vote" value="down" class="btn btn-sm btn-primary"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
    </span>
    <span class="input-group-btn">
      <button type="submit" name="vote" value="up" class="btn btn-sm btn-primary"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
    </span>
    <span class="input-group-addon" v-text="votesUp"></span>
    <input type="text" class="form-control" aria-label="Text input with checkbox">
  </div>
</template>

<script>
  export default {
    data() {
      return {
        votesDown: 0,
	votesUp: 0
      }
    }
  }
</script>